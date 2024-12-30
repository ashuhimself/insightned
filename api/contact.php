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
header('Access-Control-Allow-Origin: https://www.insightned.com');
header('Access-Control-Allow-Credentials: true');

// Create logs directory if it doesn't exist
if (!file_exists(__DIR__ . '/../logs')) {
    mkdir(__DIR__ . '/../logs', 0755, true);
}

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
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
    $cookieToken = $_COOKIE['csrf_token'] ?? null;
    $postToken = $_POST['csrf_token'] ?? null;
    $sessionToken = $_SESSION['csrf_token'] ?? null;

    error_log("Cookie Token: " . $cookieToken);
    error_log("Post Token: " . $postToken);
    error_log("Session Token: " . $sessionToken);

    if (!$postToken || ($postToken !== $cookieToken && $postToken !== $sessionToken)) {
        error_log("CSRF token validation failed");
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