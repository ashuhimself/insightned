To resolve the 500 error and JSON parsing issues:

1. Create a .env file in the project root with required SMTP and database settings:

```
DB_HOST=your_db_host
DB_USER=your_db_user
DB_PASS=your_db_password
DB_NAME=your_db_name
MAIL_HOST=your_smtp_host
MAIL_PORT=587
MAIL_USERNAME=your_smtp_username
MAIL_PASSWORD=your_smtp_password
MAIL_FROM_ADDRESS=your_from_email
```

2. Update the Dotenv loading path in contact.php from:
```php
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
```
to:
```php
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
```

This ensures both contact.php and config.php load environment variables from the same location.