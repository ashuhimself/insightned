<?php
class RateLimit {
    private $redis;
    private $maxRequests = 100;  // Max requests per window
    private $timeWindow = 3600;  // Time window in seconds (1 hour)

    public function __construct() {
        $this->redis = new Redis();
        $this->redis->connect('127.0.0.1', 6379);
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