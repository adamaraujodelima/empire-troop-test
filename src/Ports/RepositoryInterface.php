<?php

namespace Empire\Ports;

interface RepositoryInterface {
    public function get(string $key): array;
    public function save(string $key, string $content): bool;
}