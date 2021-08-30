<?php

namespace Tests\Unit;

use Empire\Domain\Entities\ArcherSoldier;
use Empire\Domain\Entities\Soldier;
use PHPUnit\Framework\TestCase;

class ArcherSoldierTest extends TestCase
{
    public function testFailWithEmptyArrayAttributes()
    {
        try {
            $soldier = new ArcherSoldier([]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The attributes in array it's required. Attributes: name, age, gender and force.");
        }
    }

    public function testFailWithEmptyAttributeName()
    {
        try {
            $soldier = new ArcherSoldier([
                'age' => 10,
                'gender' => 'male',
                'force' => 454,
            ]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The attribute name it's required!");
        }
    }

    public function testFailWithEmptyAttributeAge()
    {
        try {
            $soldier = new ArcherSoldier([
                'name' => 'Adam',
                'gender' => 'male',
                'force' => 454,
            ]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The attribute age it's required!");
        }
    }

    public function testFailWithEmptyAttributeGender()
    {
        try {
            $soldier = new ArcherSoldier([
                'age' => 10,
                'force' => 464,
                'name' => 'Adam',
            ]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The attribute gender it's required!");
        }
    }

    public function testFailWithEmptyAttributeForce()
    {
        try {
            $soldier = new Soldier([
                'age' => 10,
                'gender' => 'male',
                'name' => 'Adam',
            ]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The attribute force it's required!");
        }
    }

    public function testSuccessWithAllRequiredAttributes()
    {
        $soldier = new ArcherSoldier([
            'name' => 'Adam',
            'age' => 10,
            'gender' => 'male',
            'force' => 500,
        ]);

        $this->assertIsArray($soldier->getSoldier());
        $this->assertArrayHasKey('typeBattle', $soldier->getSoldier());
        $this->assertArrayHasKey('ability', $soldier->getSoldier());
        $this->assertArrayHasKey('name', $soldier->getSoldier());
        $this->assertArrayHasKey('age', $soldier->getSoldier());
        $this->assertArrayHasKey('gender', $soldier->getSoldier());
        $this->assertArrayHasKey('force', $soldier->getSoldier());
        $this->assertSame('archer', $soldier->getAbility());
        $this->assertSame('longDistance', $soldier->getTypeBattle());
    }
}
