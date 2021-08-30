<?php

use Empire\Adapters\Commands\MainCommand;
use Empire\Ports\RepositoryInterface;
use PHPUnit\Framework\TestCase;

class FakeCommandRepository implements RepositoryInterface
{

    public function get(string $key): array
    {
        return [];
    }

    public function save(string $key, string $content): bool
    {
        return true;
    }
}


class MainCommandTest extends TestCase
{
    public function testFailCommandWithEmptyArguments()
    {
        try {
            $command = new MainCommand([]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The arguments --n and --t it's required! E.g: `php main.php --n 200 --t 3`");
        }
    }

    public function testFailWithIncompleteArguments()
    {
        try {
            $command = new MainCommand([
                '--n',
                '--t',
            ]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The arguments passed it's not valid! E.g: `php main.php --n 200 --t 3`");
        }
    }

    public function testFailWithoutTotalSoldiersArgument()
    {
        try {
            $command = new MainCommand([
                'bb',
                10,
                '--t',
                2
            ]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The argument `--n` it's not valid or was not informed!");
        }
    }

    public function testFailWithoutTotalTroopsArgument()
    {
        try {
            $command = new MainCommand([
                '--n',
                10,
                'a',
                50
            ]);
        } catch (\Exception $e) {
            $this->assertSame($e->getMessage(), "The argument `--t` it's not valid or was not informed!");
        }
    }

    public function testSuccessWithRequiredArguments()
    {
        $command = new MainCommand([
            '--n',
            10,
            '--t',
            2
        ]);
        $output = $command->run(new FakeCommandRepository);
        $this->assertJson($output);
    }
}
