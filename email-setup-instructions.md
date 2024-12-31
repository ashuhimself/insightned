# Email Setup Instructions

To get the contact form email notifications working:

1. Move the `.env` file to the root directory of your project
2. Update the following values in `.env`:
   - `MAIL_PASSWORD`: Replace `your_app_password` with an actual Gmail App Password
     - To generate an App Password:
       1. Go to your Google Account settings
       2. Enable 2-Step Verification if not already enabled
       3. Go to Security > App passwords
       4. Generate a new app password for the website
   - Update database credentials accordingly

3. Make sure the logs directory exists:
```bash
mkdir logs
chmod 777 logs
```

4. Test the email configuration:
```bash
php test_email.php
```

If you experience any issues:
1. Check the error logs in `/logs/error.log`
2. Verify your Gmail account settings allow less secure app access
3. Confirm the SMTP ports (587) are not blocked by your server firewall