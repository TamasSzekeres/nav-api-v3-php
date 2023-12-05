<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Validation;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
interface PropertyValidatorInterface
{
    public function validateProperty(string $name, mixed $value): ErrorBag;
}
