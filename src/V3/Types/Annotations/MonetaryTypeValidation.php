<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Pénzérték validálására szolgáló annotáció.
 * Maximum 18 számjegy, ami 2 tizedesjegyet tartalmazhat.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class MonetaryTypeValidation extends FloatValidation
{
    public function __construct()
    {
        parent::__construct(
            totalDigits: 18,
            fractionDigits: 2,
        );
    }
}
