<?php

namespace NorthernLights\Command\Result;

use NorthernLights\Command\Output\OutputInterface;

/**
 * Interface CommandResultInterface
 * @package NorthernLights\Command\Result
 */
interface CommandResultInterface
{
    /**
     * Show output as a string
     *
     * @return mixed
     */
    public function __toString(): string;

    /**
     * Command output
     *
     * @return OutputInterface
     */
    public function getOutput(): OutputInterface;

    /**
     * Command status code
     *
     * @return int
     */
    public function getExitCode(): int;

    /**
     * Exec status
     *
     * @return bool
     */
    public function getStatus(): bool;

    /**
     * If error status code was 0, this will be true
     *
     * @return bool
     */
    public function isOk(): bool;
}
