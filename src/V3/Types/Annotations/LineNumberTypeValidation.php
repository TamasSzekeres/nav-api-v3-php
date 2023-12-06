<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Tételszám validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class LineNumberTypeValidation extends IntegerValidation
{
    public function __construct()
    {
        parent::__construct(
            minInclusive: 1,
            maxInclusive: PHP_INT_MAX,
        );
    }
}
