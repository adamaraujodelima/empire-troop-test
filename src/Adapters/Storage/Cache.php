<?php

namespace Empire\Adapters\Storage;

class Cache {

    public function store($content)
    {
        $hash = md5(json_encode($content)); // Hash of percentage of troops to store in memory and validate if the combination was used in other calls.
    }
}