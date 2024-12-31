<?php
// Production error handling
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/error_log/contact_errors.log');

// Set response headers early
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');

// Ensure proper response headers
ob_start();

// Load dependencies first
try {
    if (!file_exists('../vendor/autoload.php')) {
        throw new Exception('Vendor autoload.php not found');
    }
    require '../vendor/autoload.php';
} catch (Exception $e) {
    error_log("Vendor autoload failed: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server configuration error']);
    exit;
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Ensure all errors are caught and logged
set_error_handler(function($errno, $errstr, $errfile, $errline) {
    error_log("PHP Error [$errno]: $errstr in $errfile on line $errline");
    return true;
});

set_exception_handler(function($e) {
    error_log("Uncaught Exception: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An unexpected error occurred. Please try again later.'
    ]);
    exit;
});

// Validate required environment variables
function validateEnvVars() {
    $required = [
        'DB_HOST', 'DB_USER', 'DB_PASS', 'DB_NAME',
        'MAIL_HOST', 'MAIL_PORT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'MAIL_FROM_ADDRESS'
    ];
    $missing = [];
    foreach ($required as $var) {
        if (empty($_ENV[$var])) {
            $missing[] = $var;
        }
    }
    if (!empty($missing)) {
        throw new Exception('Missing required environment variables: ' . implode(', ', $missing));
    }
}

// Load environment variables and config
try {
    if (!file_exists(dirname(__DIR__) . '/.env')) {
        throw new Exception('Environment file not found');
    }
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
    validateEnvVars();
    
    if (!file_exists(__DIR__ . '/config.php')) {
        throw new Exception('Config file not found');
    }
    require_once __DIR__ . '/config.php';
} catch (Exception $e) {
    $error = $e->getMessage();
    error_log("Configuration error: " . $error);
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Server configuration error',
        'debug' => $error
    ]);
    exit;
}

// Initialize database connection with error handling
try {
    if (!defined('DB_HOST') || !defined('DB_NAME') || !defined('DB_USER') || !defined('DB_PASS')) {
        throw new Exception('Database configuration constants not defined');
    }
    
    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    error_log("Database connection error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Server configuration error']);
    exit;
}

// Get JSON data
$contentLength = isset($_SERVER['CONTENT_LENGTH']) ? (int)$_SERVER['CONTENT_LENGTH'] : 0;
$json = file_get_contents('php://input');
$receivedLength = strlen($json);

if ($json === false || $receivedLength === 0) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Failed to read request data']);
    exit;
}

$data = json_decode($json, true);
if (json_last_error() !== JSON_ERROR_NONE) {
    error_log("JSON Error: " . json_last_error_msg() . " - Raw input: " . $json);
    http_response_code(400);
    echo json_encode([
        'success' => false, 
        'message' => 'Invalid JSON format: ' . json_last_error_msg()
    ]);
    exit;
}

// Input validation
if (!$data || !is_array($data)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid request format']);
    exit;
}

// Required fields validation
if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Required fields are missing']);
    exit;
}

// Email validation
if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid email address']);
    exit;
}

// Phone is optional
$phone = isset($data['phone']) ? $data['phone'] : '';

try {
    // Save to database first
    $stmt = $db->prepare("INSERT INTO contacts (name, email, phone, message) VALUES (?, ?, ?, ?)");
    if (!$stmt->execute([$data['name'], $data['email'], $phone, $data['message']])) {
        throw new Exception("Failed to save contact information");
    }

    $emailStatus = ['admin' => false, 'user' => false];
    
    // Send admin notification
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->SMTPDebug = 2; // Enable debugging in case of SMTP issues
        $mail->Debugoutput = function($str, $level) {
            error_log("SMTP Debug: $str");
        };
        $mail->Host = $_ENV['MAIL_HOST'];
        $mail->Port = $_ENV['MAIL_PORT'];
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = $_ENV['MAIL_USERNAME'];
        $mail->Password = $_ENV['MAIL_PASSWORD'];
        $mail->setFrom($_ENV['MAIL_FROM_ADDRESS']);
        $mail->addAddress($_ENV['MAIL_USERNAME']);
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body = "Name: {$data['name']}\nEmail: {$data['email']}\nPhone: {$phone}\nMessage: {$data['message']}";
        $mail->send();
        $emailStatus['admin'] = true;
    } catch (Exception $e) {
        error_log("Admin email error: " . $e->getMessage());
    }

    // Return success response even if email fails
    echo json_encode([
        'success' => true,
        'message' => 'Thank you for your message. We will get back to you soon.',
        'email_status' => $emailStatus
    ]);

} catch (Exception $e) {
    error_log("Error processing contact form: " . $e->getMessage());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'An error occurred while processing your request. Please try again later.'
    ]);
}