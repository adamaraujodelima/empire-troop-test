<?php

namespace Empire\Domain\Entities;

use Exception;

class Soldier {
    
    private string $name;
    private string $age;
    private string $gender;
    private int $force;

    public function __construct(array $attributes)
    {
        if(empty($attributes))
            throw new Exception("The attributes in array it's required. Attributes: name, age, gender and force.", 1);
            
        $this->name = $attributes['name'] ?? throw new Exception("The attribute name it's required!", 1);
        $this->age = $attributes['age'] ?? throw new Exception("The attribute age it's required!", 1);
        $this->gender = $attributes['gender'] ?? throw new Exception("The attribute gender it's required!", 1);
        $this->force = $attributes['force'] ?? throw new Exception("The attribute force it's required!", 1);
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return intval($this->age);
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getForce()
    {
        return intval($this->force);
    }

}