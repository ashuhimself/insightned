## Email Debug Info

Based on analysis of the working test_email.php versus the non-working contact.php:

1. test_email.php uses SMTPDebug = 2 (more verbose) while contact.php uses SMTPDebug = 1
2. test_email.php has a custom debug output handler that logs to both error_log and echo
3. test_email.php loads environment variables directly while contact.php relies on them being loaded earlier

Let's update contact.php to match these working configurations.