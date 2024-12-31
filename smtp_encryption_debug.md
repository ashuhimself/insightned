## SMTP Encryption Settings

The email sending issues might be related to SMTP encryption settings. Here are the changes made:

1. Added support for configurable encryption method via MAIL_ENCRYPTION environment variable
2. Defaults to ENCRYPTION_STARTTLS if not specified
3. Both admin and user emails will use the same encryption method

To resolve continued issues:
1. Check your SMTP server's required encryption method
2. Try these different MAIL_ENCRYPTION values in your .env file:
   - `ENCRYPTION_STARTTLS` (default)
   - `ENCRYPTION_SMTPS`
   - `''` (no encryption)
3. Make sure your SMTP port matches the encryption method:
   - Port 587 for STARTTLS
   - Port 465 for SMTPS
   - Port 25 for no encryption (not recommended)

Note: The test_email.php script works, so using the same encryption method and port as configured in your .env file should work for contact.php as well.