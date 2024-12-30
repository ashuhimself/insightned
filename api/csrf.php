<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Origin: https://www.insightned.com');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Set cookie with the token
setcookie('csrf_token', $_SESSION['csrf_token'], [
    'expires' => time() + 7200,
    'path' => '/',
    'domain' => '.insightned.com',
    'secure' => true,
    'httponly' => false,
    'samesite' => 'Lax'
]);

// Ensure headers are sent
header('X-Debug-Token: ' . $_SESSION['csrf_token']);
if (session_status() === PHP_SESSION_ACTIVE) {
    session_write_close();
}

echo json_encode(['token' => $_SESSION['csrf_token']]);
?> 