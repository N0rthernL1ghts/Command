<?php

namespace NorthernLights\Command\Example;

use NorthernLights\Command\Result\CommandResultInterface;
use function NorthernLights\Command\Run as command;

require __DIR__.'/vendor/autoload.php';

/** @var CommandResultInterface $result */
$result = command('ls 7rr -all');

if ($result->isOk()) {
    // Note: $result->getOutput() will return an instance of OutputInterface which implements __toString()
    echo $result->getOutput().PHP_EOL;
} else {
    echo 'Command failed with status code '.$result->getExitCode().PHP_EOL;
}
