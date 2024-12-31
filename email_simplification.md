## Email Sending Simplification

To isolate the issue, we have temporarily simplified the email sending process:

1. Removed Reply-To header from admin email to match test_email.php configuration
2. Temporarily disabled user confirmation email
3. Simplified admin email configuration to match working test_email.php setup

This will help us determine if the issue is related to:
- Reply-To headers
- Multiple email attempts
- Complex email configurations

Once we get the admin email working, we can gradually add back:
1. Reply-To header
2. User confirmation email
3. Additional email headers and configurations

Current configuration matches test_email.php exactly, which we know works.