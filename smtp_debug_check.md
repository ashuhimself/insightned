## SMTP Configuration Debug Check

Added additional validation and debug logging to ensure SMTP settings are loaded correctly:

1. Added logging of .env file path
2. Added pre-configuration validation of SMTP settings
3. Added detailed logging of all SMTP-related environment variables
4. Added explicit check for missing required variables

Debug steps:
1. Check logs for "Loading .env from: " message to confirm correct path
2. Look for "Verifying SMTP settings before configuration" log entries
3. Check if any required settings show as 'NOT SET'
4. Verify that the values match what's in your .env file

If test_email.php works but contact.php doesn't, this will help identify if:
- The .env file is being loaded from the correct location
- All required SMTP settings are available during execution
- There are any differences in environment variable availability between the two scripts