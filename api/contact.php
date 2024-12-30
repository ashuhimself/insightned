<?php
// Production error handling
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/../logs/error.log');

require_once 'config.php';
header('Content-Type: application/json');
header("X-Frame-Options: DENY");
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");

// Create logs directory if it doesn't exist
if (!file_exists(__DIR__ . '/../logs')) {
    mkdir(__DIR__ . '/../logs', 0755, true);
}

try {
    // Test database connection
    $db = new PDO(
        "mysql:host=".DB_HOST.";dbname=".DB_NAME,
        DB_USER,
        DB_PASS
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Log connection success
    error_log("Database connected successfully");
    
    // Validate CSRF token
    error_log("Cookie CSRF token: " . ($_COOKIE['csrf_token'] ?? 'not set'));
    error_log("POST CSRF token: " . ($_POST['csrf_token'] ?? 'not set'));

    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_COOKIE['csrf_token']) {
        error_log("CSRF token validation failed");
        error_log("Cookie token: " . ($_COOKIE['csrf_token'] ?? 'null'));
        error_log("Form token: " . ($_POST['csrf_token'] ?? 'null'));
        throw new Exception('Invalid CSRF token');
    }

    // Initialize contact handler
    $handler = new ContactHandler();
    
    // Validate inputs
    $data = [
        'name' => filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING),
        'email' => filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL),
        'phone' => filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING),
        'message' => filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING)
    ];

    // Log received data
    error_log("Received data: " . print_r($data, true));

    if (!$data['name'] || !$data['email'] || !$data['message']) {
        error_log("Missing required fields");
        throw new Exception('Please fill all required fields');
    }

    // Save to database
    if ($handler->saveContact($data)) {
        error_log("Contact saved successfully");
        echo json_encode(['success' => true, 'message' => 'Message sent successfully']);
    } else {
        error_log("Failed to save contact");
        throw new Exception('Failed to save message');
    }

} catch (PDOException $e) {
    error_log("Database Error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
} catch (Exception $e) {
    error_log("General Error: " . $e->getMessage());
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
    exit;
}
?> 