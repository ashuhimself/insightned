<?php
// Production error handling
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/error.log');

// Keep database config
require_once __DIR__ . '/config.php';

// Match test_email.php exactly
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Get JSON data
$json = file_get_contents('php://input');
if ($json === false) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Failed to read request data']);
    exit;
}

$data = json_decode($json, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("JSON Error: " . json_last_error_msg() . " - Raw input: " . $json);
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid JSON format: ' . json_last_error_msg()]);
    exit;
}

if (!$data || !is_array($data)) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
    exit;
}

try {
    // Validate inputs
    $data = [
        'name' => $_POST['name'] ?? '',
        'email' => $_POST['email'] ?? '',
        'phone' => $_POST['phone'] ?? '',
        'message' => $_POST['message'] ?? ''
    ];

    // Validate required fields
    if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
        throw new Exception('Please fill all required fields');
    }

    // Save to database
    $db = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME,
        DB_USER,
        DB_PASS
    );
    
    // Ensure phone is not null if empty
    $phone = !empty($data['phone']) ? $data['phone'] : '';
    
    $stmt = $db->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$data['name'], $data['email'], $phone, $data['message']])) {
        $emailStatus = ['admin' => true, 'user' => true];
        
        // Identical setup to test_email.php
$adminMail = new PHPMailer(true);

echo "Starting email configuration test...\n\n";

try {
            // Enable debug output like test_email.php
            $adminMail->SMTPDebug = 2; // Enable verbose debug output
            $adminMail->Debugoutput = function($str, $level) {
                error_log("DEBUG: $str");
                echo "DEBUG: $str\n";
            };

            // Load environment variables exactly like test_email.php
            $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
            $dotenv->load();
            if (empty($_ENV['MAIL_HOST']) || empty($_ENV['MAIL_PORT']) || 
                empty($_ENV['MAIL_USERNAME']) || empty($_ENV['MAIL_PASSWORD']) || 
                empty($_ENV['MAIL_FROM_ADDRESS'])) {
                throw new Exception("Required SMTP configuration is missing. Please check your .env file.");
            }
            
            $adminMail->isSMTP();
            $adminMail->Host = $_ENV['MAIL_HOST'];
            $adminMail->SMTPAuth = true;
            $adminMail->Username = $_ENV['MAIL_USERNAME'];
            $adminMail->Password = $_ENV['MAIL_PASSWORD'];
            $adminMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $adminMail->Port = $_ENV['MAIL_PORT'];

            // Set admin notification email
            $adminMail->setFrom($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
            $adminMail->addAddress($_ENV['MAIL_FROM_ADDRESS']);
            
            // Set admin email content
            $adminMail->isHTML(true);
            $adminMail->Subject = 'New Contact Form Submission';
            $adminMail->Body = "Name: {$data['name']}<br>".
                              "Email: {$data['email']}<br>".
                              "Phone: {$data['phone']}<br>".
                              "Message: {$data['message']}";
            
            // Send email
            $adminMail->send();
            error_log("Admin notification email sent successfully");
        } catch (Exception $e) {
            $emailStatus['admin'] = false;
            error_log("\nERROR: " . $e->getMessage() . "\n\n");
            
            // For AJAX responses, don't throw exception, just return error status
            http_response_code(200);
            echo json_encode([
                'status' => 'error',
                'message' => 'Your message was saved but there was an issue sending the notification email. Our team has been notified.',
                'error' => $e->getMessage()
            ]);
            return; // Exit here to prevent further processing
        }
        
        // User email sending temporarily disabled for testing

        // Return success response with email status
        http_response_code(200);
        $message = 'Form data saved successfully. ';
        if (!$emailStatus['admin'] || !$emailStatus['user']) {
            $message .= 'However, there were issues sending notification emails. Our team has been notified.';
        }
        echo json_encode([
            'status' => 'success',
            'message' => $message,
            'email_status' => $emailStatus
        ]);
    } else {
        throw new Exception('Failed to save message');
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?> 