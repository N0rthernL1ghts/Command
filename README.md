Command
=======================
[![Maintainability](https://api.codeclimate.com/v1/badges/cf94b4855058501299fc/maintainability)](https://codeclimate.com/github/N0rthernL1ghts/Command/maintainability)

Command is small library providing execution of system commands in OOP way

## Deprecation

I have decided to deprecate this project. If you want to take over and continue maintaining it, welcome contact me.  
This repository is archived and there will be no further updates.  
The reason is that [symfony/process](https://github.com/symfony/process) is everything this project is, and was intended to be, but so much better, actively maintained and fully mature, so there is really no reason for this project to exist.  


## Install

Via Composer

``` bash
$ composer require northern-lights/command
```
It really is that easy!

## Usage
``` php
<?php

namespace NorthernLights\Command\Example;

use NorthernLights\Command\Result\CommandResultInterface;
use function NorthernLights\Command\Run as command;

require __DIR__ . '/vendor/autoload.php';

/** @var CommandResultInterface $result */
$result = command('ls -all');

if ($result->isOk()) {
    // Note: $result->getOutput() will return an instance of OutputInterface which implements __toString()
    echo $result->getOutput() . PHP_EOL;
} else {
    echo "Command failed with status code " . $result->getExitCode() . PHP_EOL;
}
```
See [Example](example.php)

Please pay attention to line "use function NorthernLights\Command\Run as command" which is crucial as it assigns function NorthernLights\Command\Run to commmand alias.

If you don't want to use this way, see [Run function declaration](src/Run.php)

## PSR-2 Standard
Library strives to comply with PSR-2 coding standards, therefore we included following commands:
``` bash
$ composer check-style
$ composer fix-style
```
Note: Second command will actually modify files

## PSR-4 Standard
Library complies with PSR-4 autoloading standard

## Testing

``` bash
$ composer php-lint
$ composer test
```

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.


