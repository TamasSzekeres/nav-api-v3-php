<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Base;

use ArrayAccess;
use ReflectionClass;
use ReflectionProperty;
use UnexpectedValueException;

use function array_map;
use function array_combine;
use function property_exists;

/**
 * Abstract base class for all object.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
abstract readonly class BaseObject implements ArrayAccess
{
    public function offsetExists($offset): bool
    {
        return property_exists($this, $offset);
    }

    public function offsetGet($offset): mixed
    {
        if (!$this->offsetExists($offset)) {
            throw new UnexpectedValueException("Unknown offset: ${offset}");
        }
        return $this->$offset;
    }

    public function offsetSet($offset, $value): void
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
