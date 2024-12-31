# Email Configuration Deployment Checklist

1. **Environment Setup**
   - [ ] `.env` file exists in root directory
   - [ ] Valid Gmail app password configured
   - [ ] Database credentials updated
   - [ ] File permissions set correctly (644 for .env)

2. **Server Requirements**
   - [ ] PHP version 7.4+ installed
   - [ ] Required extensions enabled:
     - [ ] openssl
     - [ ] pdo_mysql
     - [ ] sockets
   - [ ] Outbound SMTP port 587 open
   - [ ] SSL support enabled

3. **Directory Structure**
   - [ ] /logs directory exists with write permissions
   - [ ] Vendor directory present with PHPMailer
   - [ ] Config files in correct locations

4. **Testing Steps**
   1. Run email test:
      ```bash
      php test_email.php
      ```
   2. Check logs for errors:
      ```bash
      tail -f logs/error.log
      ```
   3. Submit test contact form
   4. Verify both admin and user emails

5. **Gmail Account Setup**
   - [ ] 2-Step Verification enabled
   - [ ] App password generated
   - [ ] SMTP access enabled

For detailed setup instructions, see `email-setup-instructions.md`
For troubleshooting help, see `troubleshooting-guide.md`