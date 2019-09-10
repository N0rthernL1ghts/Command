<?php

namespace NorthernLights\Command\Result;

use NorthernLights\Command\Exec;
use NorthernLights\Command\Output\Output;
use NorthernLights\Command\Output\OutputInterface;

/**
 * Class CommandResult.
 */
class CommandResult implements CommandResultInterface
{
    /** @var Exec */
    protected $command;

    /** @var OutputInterface */
    protected $outputIns;

    /**
     * CommandResult constructor.
     *
     * @param Exec $execInstance
     */
    public function __construct(Exec $execInstance)
    {
        $this->command = $execInstance;
        $this->outputIns = new Output($execInstance);
    }

    /**
     * Command output.
     *
     * @return string
     */
    public function __toString(): string
    {
        return $this->outputIns->asString();
    }

    /**
     * {@inheritdoc}
     */
    public function getOutput(): OutputInterface
    {
        return $this->outputIns;
    }

    /**
     * {@inheritdoc}
     */
    public function getExitCode(): int
    {
        return $this->command->exitCode;
    }

    /**
     * {@inheritdoc}
     */
    public function getStatus(): bool
    {
        return $this->command->exitCode === 0;
    }

    /**
     * {@inheritdoc}
     */
    public function isOk(): bool
    {
        return $this->command->exitCode === 0;
    }

    /**
     * {@inheritdoc}
     */
    public function then(callable $callback)
    {
        $callback($this);
    }
}
