<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Árfolyam adat validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class ExchangeRateTypeValidation extends FloatValidation
{
    public function __construct()
    {
        parent::__construct(
            minExclusive: 0,
            totalDigits: 14,
            fractionDigits: 6,
        );
    }
}
