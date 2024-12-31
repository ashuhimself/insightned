<?php
require 'vendor/autoload.php';

echo "Email Configuration Verification\n";
echo "==============================\n\n";

// Check .env file
echo "1. Checking .env file:\n";
if (file_exists('.env')) {
    echo "✓ .env file found\n";
    
    // Load environment variables
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    // Check required variables
    $required_vars = [
        'MAIL_HOST', 'MAIL_USERNAME', 'MAIL_PASSWORD', 
        'MAIL_PORT', 'MAIL_FROM_ADDRESS', 'MAIL_FROM_NAME'
    ];
    
    $missing = [];
    foreach ($required_vars as $var) {
        if (empty($_ENV[$var])) {
            $missing[] = $var;
        }
    }
    
    if (empty($missing)) {
        echo "✓ All required email variables are set\n";
    } else {
        echo "⨯ Missing variables: " . implode(', ', $missing) . "\n";
    }
} else {
    echo "⨯ .env file not found in root directory\n";
}

echo "\n2. Checking PHP Extensions:\n";
$required_extensions = ['openssl', 'pdo_mysql', 'sockets'];
foreach ($required_extensions as $ext) {
    if (extension_loaded($ext)) {
        echo "✓ {$ext} extension loaded\n";
    } else {
        echo "⨯ {$ext} extension missing\n";
    }
}

echo "\n3. Checking Logs Directory:\n";
if (is_dir('logs')) {
    echo "✓ logs directory exists\n";
    if (is_writable('logs')) {
        echo "✓ logs directory is writable\n";
    } else {
        echo "⨯ logs directory is not writable\n";
    }
} else {
    echo "⨯ logs directory not found\n";
}

echo "\n4. Testing SMTP Connection:\n";
$smtp_host = $_ENV['MAIL_HOST'] ?? 'smtp.gmail.com';
$smtp_port = $_ENV['MAIL_PORT'] ?? '587';

$fp = @fsockopen($smtp_host, $smtp_port, $errno, $errstr, 5);
if ($fp) {
    echo "✓ Successfully connected to {$smtp_host}:{$smtp_port}\n";
    fclose($fp);
} else {
    echo "⨯ Failed to connect to {$smtp_host}:{$smtp_port}\n";
    echo "  Error: {$errstr} ({$errno})\n";
}

echo "\nNext Steps:\n";
echo "1. Run 'php test_email.php' to test email sending\n";
echo "2. Check logs/error.log for detailed error messages\n";
echo "3. Ensure Gmail 2FA is enabled and app password is correctly set\n";
?>