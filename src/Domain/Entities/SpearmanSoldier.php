<?php

namespace Empire\Domain\Entities;

class SpearmanSoldier extends Soldier
{

    private string $ability = 'spearman';
    private string $typeBattle = 'mediumDistance';

    public function __construct(array $attributes)
    {
        parent::__construct($attributes);
    }

    public function getSoldier()
    {
        return [
            'name' => $this->getName(),
            'age' => $this->getAge(),
            'gender' => $this->getGender(),
            'force' => $this->getForce(),
            'ability' => $this->ability,
            'typeBattle' => $this->typeBattle,
        ];
    }

    public function getAbility()
    {
        return $this->ability;
    }

    public function getTypeBattle()
    {
        return $this->typeBattle;
    }
}
