<?php
session_start();
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Add security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');
header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
header('Content-Security-Policy: default-src \'self\'');

// Add rate limiting
$timeframe = 3600; // 1 hour
$max_requests = 5;

if (!isset($_SESSION['email_requests'])) {
    $_SESSION['email_requests'] = array();
}

// Clean old requests
$_SESSION['email_requests'] = array_filter($_SESSION['email_requests'], function($time) use ($timeframe) {
    return $time > (time() - $timeframe);
});

// Check rate limit
if (count($_SESSION['email_requests']) >= $max_requests) {
    http_response_code(429);
    echo json_encode(['error' => 'Too many requests. Please try again later.']);
    exit;
}

// Add current request
$_SESSION['email_requests'][] = time();

// Get POST data
$data = json_decode(file_get_contents('php://input'), true);

// Verify CSRF token
if (!isset($data['csrf_token']) || $data['csrf_token'] !== $_SESSION['csrf_token']) {
    http_response_code(403);
    echo json_encode(['error' => 'Invalid CSRF token']);
    exit;
}

// Basic validation
if (empty($data['name']) || empty($data['email']) || empty($data['message'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Please fill all required fields']);
    exit;
}

// Add more robust validation
$name = filter_var(trim($data['name']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL);
$phone = preg_replace('/[^0-9+]/', '', $data['phone'] ?? '');
$message = filter_var(trim($data['message']), FILTER_SANITIZE_STRING);

// Better validation checks
if (!$name || !$email || strlen($message) < 10) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input data']);
    exit;
}

// Add length limits
if (strlen($message) > 1000) { // Limit message length
    http_response_code(400);
    echo json_encode(['error' => 'Message too long']);
    exit;
}

// Use environment variables for sensitive data
$to = getenv('ADMIN_EMAIL') ?: 'default@example.com';
$recaptcha_secret = getenv('RECAPTCHA_SECRET');

$subject = "New Contact Form Submission from $name";

// Email content
$email_content = "
<html>
<head>
    <title>New Contact Form Submission</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; }
        .container { padding: 20px; }
        .field { margin-bottom: 10px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class='container'>
        <h2>New Contact Form Submission</h2>
        <div class='field'>
            <div class='label'>Name:</div>
            <div>$name</div>
        </div>
        <div class='field'>
            <div class='label'>Email:</div>
            <div>$email</div>
        </div>
        <div class='field'>
            <div class='label'>Phone:</div>
            <div>$phone</div>
        </div>
        <div class='field'>
            <div class='label'>Message:</div>
            <div>$message</div>
        </div>
    </div>
</body>
</html>
";

// Email headers
$headers = array(
    'MIME-Version: 1.0',
    'Content-type: text/html; charset=UTF-8',
    'From: ' . $email,
    'Reply-To: ' . $email,
    'X-Mailer: PHP/' . phpversion()
);

// Sanitize email headers
$to = filter_var($to, FILTER_SANITIZE_EMAIL);
$subject = filter_var($subject, FILTER_SANITIZE_STRING);
$headers = array_map('filter_var', $headers);

// Prevent header injection
if (preg_match('/[\r\n]/', $name) || preg_match('/[\r\n]/', $email)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

// For testing/debugging
$log_file = 'contact_log.txt';
$log_content = date('Y-m-d H:i:s') . " - New submission from: $name ($email)\n";
file_put_contents($log_file, $log_content, FILE_APPEND);

// Verify reCAPTCHA
$recaptcha_secret = "your-secret-key";
$recaptcha_response = $data['g-recaptcha-response'];

$verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}");
$captcha_success = json_decode($verify);

if (!$captcha_success->success) {
    http_response_code(400);
    echo json_encode(['error' => 'Please complete the captcha']);
    exit;
}

// Send email
try {
    if(mail($to, $subject, $email_content, implode("\r\n", $headers))) {
        http_response_code(200);
        echo json_encode([
            'message' => 'Email sent successfully',
            'data' => [
                'name' => $name,
                'email' => $email
            ]
        ]);
    } else {
        throw new Exception('Failed to send email');
    }
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
    // Add proper error logging
    error_log("Contact form submission error: " . $e->getMessage());
    // Don't expose internal errors to users
    echo json_encode(['error' => 'An error occurred. Please try again later.']);
}
?> 