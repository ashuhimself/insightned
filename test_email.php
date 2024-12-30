<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'ashutosh@insightned.com';
    $mail->Password = 'your_app_password';
    $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('officialtiwari@gmail.com', 'Insightned');
    $mail->addAddress('officialtiwari@gmail.com');
    $mail->Subject = 'Test Email';
    $mail->Body = 'This is a test email from Insightned website';

    $mail->send();
    echo "Email sent successfully";
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
} 