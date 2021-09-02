<?php

namespace LightSideSoftware\NavApi\Base;

/**
 * Abstract base class for all object.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
abstract class BaseObject
{
    /**
     * Constructor.
     *
     * Initializes the object with the given configuration.
     *
     * @param array $config Name-value pairs that will be used to initialize the object properties.
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
     */
    public function init(): void
    {
    }
}
