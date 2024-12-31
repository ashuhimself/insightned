<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

echo "Starting email configuration test...\n\n";

try {
    // Enable debug output
    $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->Debugoutput = function($str, $level) {
        error_log("DEBUG: $str");
        echo "DEBUG: $str\n";
    };
    // Load environment variables
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $mail->isSMTP();
    $mail->Host = $_ENV['MAIL_HOST'];
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['MAIL_USERNAME'];
    $mail->Password = $_ENV['MAIL_PASSWORD'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = $_ENV['MAIL_PORT'];

    // Test email settings
    $mail->setFrom($_ENV['MAIL_FROM_ADDRESS'], $_ENV['MAIL_FROM_NAME']);
    $mail->addAddress($_ENV['MAIL_FROM_ADDRESS']);
    $mail->Subject = 'Test Email Configuration';
    $mail->Body = 'If you receive this email, your email configuration is working correctly.';

    // Attempt to send test email
    $mail->send();
    echo "\nSUCCESS: Test email sent successfully!\n";
    echo "Check your inbox at {$_ENV['MAIL_FROM_ADDRESS']} for the test email.\n";
} catch (Exception $e) {
    echo "\nERROR: " . $e->getMessage() . "\n\n";
    echo "Debug Information:\n";
    echo "- PHP Version: " . PHP_VERSION . "\n";
    echo "- Mail Host: {$_ENV['MAIL_HOST']}\n";
    echo "- Mail Port: {$_ENV['MAIL_PORT']}\n";
    echo "- Mail Username: {$_ENV['MAIL_USERNAME']}\n";
    echo "- SSL/TLS Support: " . (extension_loaded('openssl') ? 'Yes' : 'No') . "\n";
    
    error_log("Email test failed: " . $e->getMessage());
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
} 