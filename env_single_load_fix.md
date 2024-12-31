## Environment Variable Single Load Fix

Fixed environment variable loading to match test_email.php's approach:

1. Previous issues:
   - Loading .env variables multiple times (in config.php and in email setup)
   - Potential variable overwriting
   - No explicit validation before SMTP configuration

2. Changes made:
   - Load .env variables only once at the start
   - Added explicit validation before SMTP configuration
   - Removed redundant .env loading in email setup
   - Added proper error messages for missing configuration

3. Environment loading sequence now matches test_email.php:
   ```php
   require 'vendor/autoload.php';
   $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
   $dotenv->load();
   // ... rest of configuration
   ```

The key is ensuring environment variables are loaded exactly once and properly validated before use.