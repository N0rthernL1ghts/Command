<?php

namespace NorthernLights\Command\Output;

use StdClass;

/**
 * Interface OutputInterface.
 */
interface OutputInterface
{
    /**
     * If instance is used as a string, output string.
     *
     * @return string
     */
    public function __toString(): string;

    /**
     * Get output as array.
     *
     * @return array
     */
    public function asArray(): array;

    /**
     * Get output as JSON.
     *
     * @param array $jsonSettings
     *
     * @return string
     */
    public function asJson(...$jsonSettings): string;

    /**
     * Get output as a string.
     *
     * @param string $delimiter
     *
     * @return string
     */
    public function asString(string $delimiter = PHP_EOL): string;

    /**
     * Get output as a standard object.
     *
     * @return StdClass
     */
    public function asObject(): StdClass;
}
