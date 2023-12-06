<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Mennyiségi érték validálására szolgáló annotáció.
 * Maximum 22 számjegy, ami 10 tizedesjegyet tartalmazhat
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class QuantityTypeValidation extends FloatValidation
{
    public function __construct()
    {
        parent::__construct(
            totalDigits: 22,
            fractionDigits: 10,
        );
    }
}
