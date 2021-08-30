<?php

namespace Tests\Unit;

use Empire\Domain\Entities\Soldier;
use PHPUnit\Framework\TestCase;

class SoldierTest extends TestCase
{
    public function testFailWithEmptyArrayAttributes()
    {
        try {
            $soldier = new Soldier([]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The attributes in array it's required. Attributes: name, age, gender and force.");
        }
    }

    public function testFailWithEmptyAttributeName()
    {
        try {
            $soldier = new Soldier([
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
            $soldier = new Soldier([
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
            $soldier = new Soldier([
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
        $soldier = new Soldier([
            'name' => 'Adam',
            'age' => 10,
            'gender' => 'male',
            'force' => 500,
        ]);

        $this->assertSame('Adam', $soldier->getName());
        $this->assertSame(10, $soldier->getAge());
        $this->assertSame('male', $soldier->getGender());
        $this->assertSame(500, $soldier->getForce());
    }
}
