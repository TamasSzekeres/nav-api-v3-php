<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Lapozó paraméter (válaszok számára) validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class ResponsePageTypeValidation extends IntegerValidation
{
    public function __construct()
    {
        parent::__construct(minInclusive: 0);
    }
}
