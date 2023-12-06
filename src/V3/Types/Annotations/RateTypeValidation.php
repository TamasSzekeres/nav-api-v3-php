<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Arány validálására szolgáló annotáció.
 * 0 és 1 közötti szám, legfeljebb 4 tizedesjegy pontossággal.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class RateTypeValidation extends FloatValidation
{
    public function __construct()
    {
        parent::__construct(
            minInclusive: 0.0,
            maxInclusive: 1.0,
            totalDigits: 5,
            fractionDigits: 4,
        );
    }
}
