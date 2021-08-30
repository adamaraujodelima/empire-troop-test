<?php

namespace Empire\Adapters\Commands;

use Empire\Adapters\Repositories\CacheRepository;
use Empire\Domain\UserCases\TroopUserCase;
use Exception;

class MainCommand
{
    private $args;

    public function __construct(array $args)
    {
        if (count($args) == 0)
            throw new Exception("The arguments --n and --t it's required! E.g: `php main.php --n 200 --t 3`", 1);

        if (count($args) != 4)
            throw new Exception("The arguments passed it's not valid! E.g: `php main.php --n 200 --t 3`", 1);

        if ($args[0] != '--n' || !$args[1])
            throw new Exception("The argument `--n` it's not valid or was not informed!", 1);

        if ($args[2] != '--t' || !$args[3])
            throw new Exception("The argument `--t` it's not valid or was not informed!", 1);

        $this->args = $args;
    }

    public function run(): void
    {
        $repository = new CacheRepository();
        $troopUserCase = new TroopUserCase($repository);
        $troops = $troopUserCase->mount($this->args[1], $this->args[3]);
        echo json_encode($troops);
    }
}






