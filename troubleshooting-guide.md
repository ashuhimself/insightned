# Email Troubleshooting Guide

If the contact form emails are not working on your deployed website, follow these steps:

1. **Check Environment File:**
   - Ensure `.env` file exists in the root directory
   - Verify all email settings are correctly configured:
     ```
     MAIL_HOST=smtp.gmail.com
     MAIL_USERNAME=your-email@gmail.com
     MAIL_PASSWORD=your-app-password
     MAIL_PORT=587
     MAIL_ENCRYPTION=tls
     MAIL_FROM_ADDRESS=your-email@gmail.com
     MAIL_FROM_NAME="Contact Form"
     ```

2. **Verify Gmail Configuration:**
   - Enable 2-Step Verification on your Gmail account
   - Generate an App Password:
     1. Go to Google Account Settings
     2. Security > 2-Step Verification
     3. App passwords (at the bottom)
     4. Select "Other (Custom name)"
     5. Use the generated 16-character password in your .env file

3. **Check Server Requirements:**
   - Ensure PHP has SSL support enabled
   - Verify outbound SMTP port 587 is not blocked
   - Check PHP has proper permissions to read .env file

4. **Debug Steps:**
   1. Enable error logging:
      ```bash
      mkdir logs
      chmod 777 logs
      ```
   
   2. Check error logs:
      ```bash
      tail -f logs/error.log
      ```
   
   3. Test email configuration:
      ```bash
      php test_email.php
      ```

5. **Common Issues:**
   - Incorrect app password
   - SSL certificate issues
   - Server firewall blocking SMTP
   - Missing PHP extensions (openssl, socket)
   - File permissions on .env or logs directory

6. **Quick Fixes:**
   - Regenerate Gmail app password
   - Check file permissions: `chmod 644 .env`
   - Verify PHP modules: `php -m | grep -E 'openssl|sockets'`
   - Test SMTP connection: `telnet smtp.gmail.com 587`

For additional assistance, check the error logs at `/logs/error.log` for specific error messages.