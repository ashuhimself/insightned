# Quick Email Configuration Fix

If emails are not working on your production server, follow these steps:

1. First, verify your setup:
```bash
php verify_email_setup.php
```

2. Common Quick Fixes:

a) Fix .env file permissions:
```bash
# Copy .env to production server if missing
scp .env your-server:/path/to/website/
# Set correct permissions
chmod 644 .env
```

b) Create and set logs directory:
```bash
mkdir logs
chmod 777 logs
```

c) Generate new Gmail App Password:
- Go to Google Account settings
- Security > 2-Step Verification > App passwords
- Generate new password and update .env:
```bash
# Edit .env file
nano .env
# Update MAIL_PASSWORD with new app password
```

d) Test email configuration:
```bash
# Run verification
php verify_email_setup.php
# Test email sending
php test_email.php
# Check logs for errors
tail -f logs/error.log
```

3. Still having issues?
- Ensure PHP has SSL support enabled
- Check if port 587 is open on your server
- Verify PHP extensions: openssl, sockets
- Make sure your hosting provider allows SMTP connections