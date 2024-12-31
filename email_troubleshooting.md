## Email Configuration Troubleshooting Steps

1. Added direct environment variable loading in contact.php
2. Added more verbose debug output (SMTPDebug = 2)
3. Added debug output handler to log both to error_log and echo
4. Added SSL/TLS options to allow self-signed certificates
5. Added UTF-8 encoding and character set configurations
6. Added better error handling and status reporting
7. Added fallback port 587 if MAIL_PORT is not set

Please check the following:
1. Verify that all required environment variables are set in your .env file
2. Check the error logs for detailed SMTP communication
3. Ensure the SMTP server (MAIL_HOST) is accessible from your server
4. Verify that the SMTP credentials (MAIL_USERNAME and MAIL_PASSWORD) are correct
5. Try running verify_email_setup.php to test your email configuration