<?php

namespace LightSideSoftware\NavApi\V3\Base;

use ArrayAccess;
use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use ReflectionClass;
use ReflectionProperty;
use UnexpectedValueException;

use function array_map;
use function array_combine;

/**
 * Abstract base class for all object.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
abstract class BaseObject implements ArrayAccess
{
    /**
     * Constructor.
     *
     * Initializes the object with the given configuration.
     *
     * @param array<string, mixed> $config Name-value pairs that will be used to initialize the object properties.
     */
    public function __construct(array $config = [])
    {
        foreach ($config as $property => $value) {
            $this->$property = $value;
        }
        $this->init();
    }

    /**
     * Initializes the object.
     *
     * This method is invoked at the end of the constructor after the object is initialized with the given configuration.
     *
     * @throws InvalidConfigException
     */
    protected function init(): void
    {
    }

    public function offsetExists($offset): bool
    {
        return property_exists($this, $offset);
    }

    public function offsetGet($offset)
    {
        if (!$this->offsetExists($offset)) {
            throw new UnexpectedValueException("Unknown offset: ${offset}");
        }
        return $this->$offset;
    }

    public function offsetSet($offset, $value)
    {
        if (!$this->offsetExists($offset)) {
            throw new UnexpectedValueException("Unknown offset: ${offset}");
        }
        $this->$offset = $value;
    }

    public function offsetUnset($offset): void
    {
        if (!$this->offsetExists($offset)) {
            throw new UnexpectedValueException("Unknown offset: ${offset}");
        }
        $this->$offset = null;
    }

    /**
     * @return array<string, mixed> [name => type]
     */
    public function attributes(): array
    {
        $reflection = new ReflectionClass($this);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC & ~ReflectionProperty::IS_STATIC);

        return array_map(function (ReflectionProperty $property) {
            return $property->getName();
        }, $properties);
    }

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        $attributes = $this->attributes();

        $values = array_map(function (string $property) {
            return $this->$property;
        }, $attributes);

        return array_combine($attributes, $values);
    }
}
