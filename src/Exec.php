<?php

namespace NorthernLights\Command;

use NorthernLights\Command\Result\CommandResult;
use NorthernLights\Command\Result\CommandResultInterface;

/**
 * Class Exec
 * @package NorthernLights\Command
 */
class Exec
{
    /** @var string */
    public $command;

    /** @var array */
    public $output;

    /** @var int */
    public $exitCode;

    /**
     * Exec constructor.
     *
     * @param string $command
     * @param bool $passThrough
     */
    private function __construct(string $command, bool $passThrough = false)
    {
        $this->output      = [];
        $this->command     = $command;
        $this->exitCode    = 1;

        exec(
            $command. ($passThrough ?: ' 2>&1'),
            $this->output,
            $this->exitCode
        );
    }

    /**
     * Creates new instance of self, and passes it to new instance of CommandResult
     *
     * @param string $command
     * @param bool $passThrough
     *
     * @return CommandResultInterface
     */
    public static function command(string $command, bool $passThrough = false): CommandResultInterface
    {
        return new CommandResult(
            new static(
                $command,
                $passThrough
            )
        );
    }
}
