<?php
class RateLimit {
    private $db;
    private $maxRequests = 100;  // Max requests per window
    private $timeWindow = 3600;  // Time window in seconds (1 hour)

    public function __construct() {
        // Using DB to store rate limiting data
        $this->db = new PDO(
            "mysql:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", 
            $_ENV['DB_USER'], 
            $_ENV['DB_PASS']
        );
    }

    public function checkLimit($ip) {
        $key = "rate_limit:$ip";
        $current = $this->redis->get($key);

        if (!$current) {
            $this->redis->setex($key, $this->timeWindow, 1);
            return true;
        }

        if ($current >= $this->maxRequests) {
            return false;
        }

        $this->redis->incr($key);
        return true;
    }
} 