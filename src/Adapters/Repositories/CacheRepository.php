<?php

namespace Empire\Adapters\Repositories;

use Empire\Adapters\Storage\Cache;
use Empire\Ports\RepositoryInterface;

class CacheRepository implements RepositoryInterface{

    private $model;

    public function __construct()
    {
        $this->model = new Cache();
    }

    public function get(string $key): array
    {
        $content = $this->model->get($key);
        return json_decode($content) ?? [];
    }
   
    public function save(string $key, string $content): bool
    {
        return $this->model->store($key, $content);
    }
}