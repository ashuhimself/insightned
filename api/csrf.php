<?php
header('Content-Type: application/json');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Set cookie with the token
setcookie('csrf_token', $_SESSION['csrf_token'], 
    time() + 7200,  // expires in 2 hours
    '/',           // path
    '',           // domain
    true,         // secure
    true          // httponly
);

// Ensure headers are sent
if (session_status() === PHP_SESSION_ACTIVE) {
    session_write_close();
}

echo json_encode(['token' => $_SESSION['csrf_token']]);
?> 