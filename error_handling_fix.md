## Error Handling Fix

Updated the error handling approach in contact.php to match the working test_email.php:

1. Moved configuration checking into the try block
2. Simplified the email setup to match test_email.php exactly
3. Removed all non-essential configurations
4. Throwing the exception after logging for proper error propagation

The key differences:
- test_email.php wraps the entire email setup and sending in one try-catch block
- contact.php was previously splitting the error handling
- Now both files handle errors the same way

This change ensures that any configuration or sending errors will be caught and handled consistently.