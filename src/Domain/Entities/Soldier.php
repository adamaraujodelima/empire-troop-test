<?php

namespace Empire\Domain\Entities;

class Soldier {
    
    private string $name;
    private string $age;
    private string $gender;
    private int $force;

    public function __construct(array $attributes)
    {
        $this->name = $attributes['name'];
        $this->age = $attributes['age'];
        $this->gender = $attributes['gender'];
        $this->force = $attributes['force'];
    }

    public function getName()
    {
        return $this->name;
    }

    public function getAge()
    {
        return $this->age;
    }

    public function getGender()
    {
        return $this->gender;
    }

    public function getForce()
    {
        return $this->force;
    }

}