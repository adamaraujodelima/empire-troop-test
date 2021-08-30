<?php

namespace Empire\Adapters\Storage;

use Redis;

class Cache {

    private $redis;

    public function __construct()
    {
        $this->redis = new Redis();
        $this->redis->connect('redis', 6379);
        $this->redis->auth('EmpireRedis2021!');
    }

    public function get(string $key)
    {
        return $this->redis->get($key);
    }

    public function store(string $key, string $content)
    {
        return $this->redis->set($key, $content);
    }
}