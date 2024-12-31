## Environment Loading Path Fix

The issue appears to be related to how the .env file is being loaded. Here are the key changes made:

1. Previously in contact.php we were using: `__DIR__ . '/..`
2. Changed to use: `dirname(__DIR__)`
3. This matches the working test_email.php configuration
4. This ensures we're loading from the root directory where .env is located

Additional debug steps if still having issues:
1. Run `verify_email_setup.php` to confirm environment variables are loaded correctly
2. Check the logs at `/logs/error.log` for any SMTP communication errors
3. Ensure the .env file is in the root directory of the project