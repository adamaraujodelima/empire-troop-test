<?php

use Empire\Domain\UserCases\TroopUserCase;
use Empire\Ports\RepositoryInterface;
use PHPUnit\Framework\TestCase;

class FakeRepository implements RepositoryInterface{
    
    public function get(string $key): array
    {
        return [];
    }

    public function save(string $key, string $content): bool
    {
        return true;
    }
}


class TroopUserCaseTest extends TestCase{

    public function testSuccessMountTroopsWithFakeRepository()
    {
        $troopUserCase = new TroopUserCase(new FakeRepository());
        $troops = $troopUserCase->mount(10,2);
        $this->assertIsArray($troops);
        $this->assertCount(2,$troops);
    }
}