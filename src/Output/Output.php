<?php

namespace NorthernLights\Command\Output;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use NorthernLights\Command\Exception\ReadOnlyObjectException;
use NorthernLights\Command\Exec;
use StdClass;

class Output implements OutputInterface, ArrayAccess, Countable, IteratorAggregate
{
    /** @var Exec */
    protected $exec;

    /** @var array */
    protected $output;

    /** @var string|null */
    protected $cacheOutputJson;

    /** @var StdClass|null */
    protected $cacheOutputObject;

    /** @var string|null */
    protected $cacheOutputString;

    /**
     * Output constructor.
     *
     * @param Exec $execInstance
     */
    public function __construct(Exec $execInstance)
    {
        $this->exec = $execInstance;
        $this->output = $execInstance->output;
    }

    /**
     * {@inheritdoc}
     */
    public function __toString(): string
    {
        return $this->asString();
    }

    /**
     * {@inheritdoc}
     */
    public function asArray(): array
    {
        return $this->output;
    }

    /**
     * {@inheritdoc}
     */
    public function asJson(...$jsonSettings): string
    {
        return $this->cacheOutputJson ?? $this->cacheOutputJson = json_encode($this->output, ...$jsonSettings);
    }

    /**
     * {@inheritdoc}
     */
    public function asObject(): StdClass
    {
        return $this->cacheOutputObject ?? $this->cacheOutputObject = (object) $this->output;
    }

    /**
     * {@inheritdoc}
     */
    public function asString(string $delimiter = PHP_EOL): string
    {
        return $this->cacheOutputString ?? $this->cacheOutputString = implode($delimiter, $this->output);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetExists($offset)
    {
        return isset($this->output[$offset]);
    }

    /**
     * {@inheritdoc}
     */
    public function offsetGet($offset)
    {
        return $this->output[$offset] ?? null;
    }

    /**
     * {@inheritdoc}
     *
     * @throws ReadOnlyObjectException
     */
    public function offsetSet($offset, $value)
    {
        throw new ReadOnlyObjectException('Object has read-only access');
    }

    /**
     * {@inheritdoc}
     *
     * @throws ReadOnlyObjectException
     */
    public function offsetUnset($offset)
    {
        throw new ReadOnlyObjectException('Object has read-only access');
    }

    /**
     * {@inheritdoc}
     */
    public function count()
    {
        return count($this->output);
    }

    /**
     * {@inheritdoc}
     */
    public function getIterator()
    {
        return new ArrayIterator($this->output);
    }
}
