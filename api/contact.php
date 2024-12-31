<?php
// Production error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/error.log');

require_once 'config.php';
require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

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
        // Send email
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['MAIL_USER'];
        $mail->Password = $_ENV['MAIL_PASS'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom($_ENV['MAIL_USER'], 'Insightned Contact Form');
        $mail->addAddress($_ENV['MAIL_USER']);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: {$data['name']}\n";
        $mail->Body .= "Email: {$data['email']}\n";
        $mail->Body .= "Phone: {$data['phone']}\n";
        $mail->Body .= "Message: {$data['message']}\n";

        $mail->send();

        echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
    } else {
        throw new Exception('Failed to save message');
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?> 