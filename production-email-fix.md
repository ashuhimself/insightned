# Production Email Configuration Fix

Follow these steps in order to fix the email issues on your production server:

1. **Check .env File Setup**
```bash
# Connect to your production server and navigate to website root
cd /path/to/website

# Verify .env file exists and has correct permissions
ls -l .env
# If missing, copy from your local machine
scp .env username@your-server:/path/to/website/

# Set correct permissions
chmod 644 .env
```

2. **Update Gmail Configuration**
- Log into the Gmail account (ashutosh@insightned.com)
- Go to Google Account Settings
- Enable 2-Step Verification if not already enabled
- Generate new App Password:
  - Security > 2-Step Verification > App passwords
  - Generate new password for "Website Contact Form"
  - Update the .env file with new password:
    ```bash
    nano .env
    # Update MAIL_PASSWORD with new app password
    ```

3. **Set Up Error Logging**
```bash
# Create logs directory if it doesn't exist
mkdir -p logs
chmod 777 logs

# Test email configuration
php verify_email_setup.php
php test_email.php

# Check error logs
tail -f logs/error.log
```

4. **Test Production Environment**
```bash
# Check PHP extensions
php -m | grep -E 'openssl|sockets|ssl'

# Test SMTP connection
telnet smtp.gmail.com 587

# Check file permissions
ls -l .env
ls -ld logs/
```

5. **Verify Email Settings**
Make sure these settings match in your .env file:
```
MAIL_HOST=smtp.gmail.com
MAIL_USERNAME=ashutosh@insightned.com
MAIL_PORT=587
MAIL_ENCRYPTION=tls
```

6. **Test Contact Form**
- Submit a test message through the contact form
- Check logs for any errors: `tail -f logs/error.log`
- Verify both admin and user receive emails

If still experiencing issues:
1. Check if your hosting provider blocks outgoing SMTP
2. Verify PHP has SSL support enabled
3. Make sure port 587 is not blocked by firewall
4. Try regenerating the Gmail app password

For detailed troubleshooting steps, see `troubleshooting-guide.md`