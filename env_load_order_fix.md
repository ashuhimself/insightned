## Environment Variable Loading Order Fix

The key difference between test_email.php and contact.php was the timing of environment variable loading:

1. test_email.php (working):
   ```php
   $mail = new PHPMailer(true);
   // Debug settings...
   $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
   $dotenv->load();
   // SMTP settings...
   ```

2. contact.php (fixed to match):
   ```php
   $adminMail = new PHPMailer(true);
   // Debug settings...
   $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
   $dotenv->load();
   // SMTP settings...
   ```

The order matters because:
1. PHPMailer needs a clean state when initialized
2. Environment variables should be loaded right before they're used
3. This ensures all SMTP settings are fresh and available

This change makes contact.php match the exact working sequence from test_email.php.