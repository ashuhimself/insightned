<?php
require_once 'config.php';

class ContactHandler {
    private $db;
    
    public function __construct() {
        // Using DB credentials from .env
        $this->db = new PDO(
            "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", 
            $_ENV['DB_USER'], 
            $_ENV['DB_PASS']
        );
    }

    public function saveContact($data) {
        $stmt = $this->db->prepare("
            INSERT INTO contacts (name, email, phone, message, created_at) 
            VALUES (?, ?, ?, ?, NOW())
        ");
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['phone'],
            $data['message']
        ]);
    }
}
?> 