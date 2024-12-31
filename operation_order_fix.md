## Operation Order Fix

Updated contact.php to match the exact sequence of operations from test_email.php:

1. Original sequence in contact.php:
   - Load environment variables at the top
   - Verify SMTP settings
   - Create PHPMailer instance
   - Configure email

2. New sequence matching test_email.php:
   - Create PHPMailer instance first
   - Enable debug output
   - Let config.php handle environment variables
   - Configure email settings

The key difference is that test_email.php creates the PHPMailer instance before dealing with environment variables, which might affect how PHPMailer initializes its internal state.

This change ensures we're following the exact same working pattern as test_email.php.