<?php

use Empire\Adapters\Commands\MainCommand;
use Empire\Adapters\Repositories\CacheRepository;
use Empire\Domain\UserCases\TroopUserCase;

require './vendor/autoload.php';
$args = array_slice($argv,1);
$repository = new CacheRepository();
$command = new MainCommand($args);
$output = $command->run($repository);
echo $output;
exit;