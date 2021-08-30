<?php

use Empire\Adapters\Commands\MainCommand;

require './vendor/autoload.php';
$args = array_slice($argv,1);
$command = new MainCommand($args);
$command->run();