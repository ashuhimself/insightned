<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

try {
    require '../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
    require_once 'config.php';
    
    $testVars = [
        'DB_HOST', 'DB_USER', 'DB_NAME', 'DB_PASS',
        'MAIL_HOST', 'MAIL_PORT', 'MAIL_USERNAME', 'MAIL_PASSWORD', 'MAIL_FROM_ADDRESS'
    ];
    
    $results = [];
    foreach ($testVars as $var) {
        $results[$var] = [
            'env' => !empty($_ENV[$var]),
            'getenv' => !empty(getenv($var)),
            'defined' => defined($var)
        ];
    }
    
    echo json_encode(['success' => true, 'results' => $results], JSON_PRETTY_PRINT);
} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}