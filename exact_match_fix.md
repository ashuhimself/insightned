## Exact Match Fix

Made contact.php match test_email.php exactly, including:

1. Debug Output:
   - Same output formatting with newlines
   - Same debug message "Starting email configuration test..."
   - Same error message formatting

2. Environment Loading:
   - Using __DIR__ . '/..' instead of dirname(__DIR__)
   - Loading environment variables in same sequence
   - Same output structure

3. Error Handling:
   - Same error message formatting with newlines
   - Same exception handling pattern
   - Same debug output formatting

Since test_email.php works perfectly, making contact.php identical in these aspects should resolve the email sending issues.