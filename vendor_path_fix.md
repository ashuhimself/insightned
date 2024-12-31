## Vendor Path Fix

Found critical difference in vendor autoload path between test_email.php and contact.php:

1. test_email.php (working):
```php
require 'vendor/autoload.php';
```

2. contact.php (previous):
```php
require_once __DIR__ . '/../vendor/autoload.php';
```

3. contact.php (fixed):
```php
require_once __DIR__ . '/config.php'; // Keep database functionality
require 'vendor/autoload.php'; // Match test_email.php exactly
```

Key points:
1. test_email.php works with simple vendor path
2. contact.php needed both:
   - Database configuration from config.php
   - Exact same vendor path as test_email.php
3. Order matters:
   - Load config.php first for database
   - Then load vendor exactly like test_email.php
4. Use same path format to ensure PHPMailer loads correctly

The autoloader path format appears to be critical for PHPMailer's proper initialization.