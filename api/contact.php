<?php
// Production error handling
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/error.log');

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/../vendor/autoload.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

// Get JSON data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if (!$data) {
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

    if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
        throw new Exception('Please fill all required fields');
    }

    // Save to database
    $db = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME,
        DB_USER,
        DB_PASS
    );
    
    $stmt = $db->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$data['name'], $data['email'], $data['phone'], $data['message']])) {
        // Send notification email to admin
        $adminMail = new PHPMailer(true);
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
        $adminMail->addReplyTo($data['email'], $data['name']);
        
        // Set admin email content
        $adminMail->isHTML(true);
        $adminMail->Subject = 'New Contact Form Submission';
        $adminMail->Body = "Name: {$data['name']}<br>".
                          "Email: {$data['email']}<br>".
                          "Phone: {$data['phone']}<br>".
                          "Message: {$data['message']}";
        
        // Send confirmation email to user
        $userMail = new PHPMailer(true);
        $userMail->isSMTP();
        $userMail->Host = $_ENV['MAIL_HOST'];
        $userMail->SMTPAuth = true;
        $userMail->Username = $_ENV['MAIL_USERNAME'];
        $userMail->Password = $_ENV['MAIL_PASSWORD'];
        $userMail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $userMail->Port = $_ENV['MAIL_PORT'];
        
        // Set user confirmation email
        $userMail->setFrom($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
        $userMail->addAddress($data['email'], $data['name']);
        
        // Set user email content
        $userMail->isHTML(true);
        $userMail->Subject = 'Thank you for contacting us';
        $userMail->Body = "Dear {$data['name']},<br><br>".
                         "Thank you for contacting us. We have received your message and will respond shortly.<br><br>".
                         "Best regards,<br>".
                         $_ENV['MAIL_FROM_NAME'];
        
        // Send both emails and log any errors
        try {
            $adminMail->send();
            error_log("Admin notification email sent successfully");
        } catch (Exception $e) {
            error_log("Failed to send admin notification email: " . $e->getMessage());
            throw new Exception("Failed to send admin notification");
        }

        try {
            $userMail->send();
            error_log("User confirmation email sent successfully");
            
            http_response_code(200);
            echo json_encode([
                'success' => true,
                'message' => 'Your message has been received. Please check your email for confirmation.'
            ]);
        } catch (Exception $e) {
            error_log("Failed to send user confirmation email: " . $e->getMessage());
            throw new Exception("Failed to send confirmation email");
        }

        // Success response is already sent in the try-catch block above
    } else {
        throw new Exception('Failed to save message');
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?> 