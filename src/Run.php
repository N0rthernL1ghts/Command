<?php

namespace NorthernLights\Command;

use NorthernLights\Command\Result\CommandResultInterface;

/**
 * Initialize exec and return results.
 *
 * @param string $command
 * @param bool   $passThrough
 *
 * @return CommandResultInterface
 */
function Run(string $command, bool $passThrough = false): CommandResultInterface
{
    return Exec::command(
        $command,
        $passThrough
    );
}
