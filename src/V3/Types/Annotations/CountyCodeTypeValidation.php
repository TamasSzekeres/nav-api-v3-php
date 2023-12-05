<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Megyekód validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class CountyCodeTypeValidation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(
            minLength: 2,
            maxLength: 2,
            pattern: '[0-9]{2}',
        );
    }
}
