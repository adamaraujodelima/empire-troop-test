<?php

namespace Tests\Unit;

use Empire\Domain\Entities\Troop;
use PHPUnit\Framework\TestCase;

class TroopTest extends TestCase
{
    public function testFailWithTotalSoldiersSmallerThan1()
    {
        try {
            $troop = new Troop(1,3);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(),'The number of total soldiers must be greather than 1');
        }
    }

    public function testFailWithTotalTroopsSmallerThan1()
    {
        try {
            $troop = new Troop(10,0);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), 'The number of total troops must be greather than 0');
        }
    }

    public function testSuccessWithParametersRequired()
    {
        $troop = new Troop(10,2);
        $troops = $troop->getTroops();
        $this->assertIsArray($troops);
        $this->assertCount(2,$troops);
        $this->assertSame(10, array_sum($troops));
    }

    // public function testFailWithEmptyNameField(): void
    // {
    //     $this->expectExceptionMessage('The name field cannot be empty');
    //     $buyer = new Buyer([
    //         'name' => '',
    //         'document' => '145674564d56a6dasda',
    //         'active' => true,
    //         'createdAt' => new DateTime(),
    //         'updatedAt' => new DateTime(),
    //     ]);
    // }

    // public function testFailWithEmptyDocumentField(): void
    // {
    //     $this->expectExceptionMessage('The document field cannot be empty');
    //     $buyer = new Buyer([
    //         'name' => 'Adam A. de Lima',
    //         'document' => '',
    //         'active' => true,
    //         'createdAt' => new DateTime(),
    //         'updatedAt' => new DateTime(),
    //     ]);
    // }

    // public function testFailWithEmptyCreatedAtField(): void
    // {
    //     $this->expectException(\TypeError::class);
    //     $buyer = new Buyer([
    //         'name' => 'Adam A. de Lima',
    //         'document' => '145674564d56a6dasda',
    //         'active' => true,
    //         'createdAt' => new DateTime(),
    //         'updatedAt' => '',
    //     ]);
    // }

    // public function testFailWithEmptyUpdatedAtField(): void
    // {
    //     $this->expectException(\TypeError::class);
    //     $buyer = new Buyer([
    //         'name' => 'Adam A. de Lima',
    //         'document' => '145674564d56a6dasda',
    //         'active' => true,
    //         'createdAt' => '',
    //         'updatedAt' => new DateTime(),
    //     ]);
    // }
}
