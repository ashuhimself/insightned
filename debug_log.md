# Email Debugging Steps

When the contact form emails are not working:

1. **Check Error Logs First**
```bash
tail -f logs/error.log
```

2. **Run Email Verification**
```bash
php verify_email_setup.php
```

3. **Test Email Configuration**
```bash
php test_email.php
```

4. **Verify File Permissions**
```bash
ls -l .env
ls -ld logs/
```

5. **Check PHP Configuration**
```bash
php -m | grep -E 'openssl|sockets|ssl'
```

6. **Test SMTP Connection**
```bash
telnet smtp.gmail.com 587
```

7. **Common Error Solutions:**

- "Failed to authenticate on SMTP server":
  - Regenerate Gmail App Password
  - Check .env MAIL_PASSWORD value

- "Could not access .env file":
  - Check file exists: `ls -l .env`
  - Fix permissions: `chmod 644 .env`

- "Failed to connect to SMTP host":
  - Verify port 587 is open
  - Check server firewall settings
  - Ensure PHP has SSL support

- "Logs directory not writable":
  - Create directory: `mkdir logs`
  - Set permissions: `chmod 777 logs`

8. **Check Gmail Settings:**
- Enable 2-Step Verification
- Generate fresh App Password
- Allow less secure app access

For detailed setup instructions: `cat email-setup-instructions.md`
For comprehensive troubleshooting: `cat troubleshooting-guide.md`