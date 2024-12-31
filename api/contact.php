<?php
// Production error handling
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/error.log');

// Load dependencies first
require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load environment variables and config
try {
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    require_once __DIR__ . '/config.php';
} catch (Exception $e) {
    error_log("Configuration error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server configuration error']);
    exit;
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Get JSON data
$contentLength = isset($_SERVER['CONTENT_LENGTH']) ? (int)$_SERVER['CONTENT_LENGTH'] : 0;
$json = file_get_contents('php://input');
$receivedLength = strlen($json);

error_log("Expected Content-Length: " . $contentLength . ", Received Length: " . $receivedLength);

if ($json === false || $receivedLength === 0) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Failed to read request data']);
    exit;
}

$data = json_decode($json, true);
if ($contentLength > $receivedLength) {
    error_log("Incomplete data received. Expected: " . $contentLength . " bytes, Got: " . $receivedLength . " bytes");
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Incomplete data received. Request was truncated.'
    ]);
    exit;
}

if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("JSON Error: " . json_last_error_msg() . " - Raw input: " . $json);
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Invalid JSON format: ' . json_last_error_msg()
    ]);
    exit;
}

if (!$data || !is_array($data)) {
    echo json_encode(['success' => false, 'message' => 'Invalid JSON data']);
    exit;
}

try {
    // Data has already been decoded from JSON at this point
    // Validate required fields
    if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Please fill all required fields']);
        exit;
    }

    // Save to database
    try {
        $db = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME,
            DB_USER,
            DB_PASS
        );
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        error_log("Database connection failed: " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => 'Database connection failed']);
        exit;
    }
    
    // Ensure phone is not null if empty
    $phone = !empty($data['phone']) ? $data['phone'] : '';
    
    $stmt = $db->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$data['name'], $data['email'], $phone, $data['message']])) {
        $emailStatus = ['admin' => true, 'user' => true];
        
        // Identical setup to test_email.php
$adminMail = new PHPMailer(true);

// Initialize email configuration

try {
            $adminMail->SMTPDebug = 0; // Disable debug output in production
            $adminMail->Debugoutput = function($str, $level) {
                error_log("DEBUG: $str");
            };

            // Configure SMTP using environment variables
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
        if (!$emailStatus['admin']) {
            error_log("Failed to send admin notification email");
            $message .= ' However, there were issues sending notification emails. Our team has been notified.';
        }
        echo json_encode([
            'success' => true,
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