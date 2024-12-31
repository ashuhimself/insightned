## Environment Loading In Try Block Fix

The key issue was where we load environment variables. Here's what we changed:

1. test_email.php (working):
```php
try {
    $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) { ... };
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();
    
    // SMTP configuration...
}
```

2. contact.php (updated to match):
```php
try {
    $adminMail->SMTPDebug = 2;
    $adminMail->Debugoutput = function($str, $level) { ... };
    
    $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
    $dotenv->load();
    
    // SMTP configuration...
}
```

Key changes:
1. Removed environment loading from top of file
2. Moved environment loading inside try block
3. Load variables right before SMTP configuration
4. Use same error handling structure

This ensures that any environment loading issues are caught in the same try-catch block as other email-related errors, matching the working test_email.php implementation exactly.