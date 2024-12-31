## Vendor Root Path Fix

The final critical difference was how test_email.php and contact.php handle the vendor path:

1. test_email.php is in project root:
```php
// Works because it's in root directory
require 'vendor/autoload.php';
```

2. contact.php is in api/ subdirectory, so we need to:
```php
// Change to project root directory first
chdir(__DIR__ . '/..');
// Then use same path as test_email.php
require 'vendor/autoload.php';
```

Key points:
1. test_email.php works because vendor/ is relative to its location
2. contact.php needs to change directory first to match the same relative path
3. This ensures PHPMailer autoloader works identically in both files

Why this fixes the issue:
1. PHPMailer autoloader needs consistent path context
2. Both files now load vendor from same relative location
3. All paths match working test_email.php setup exactly
4. Database functionality preserved with absolute path to config.php