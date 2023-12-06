<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * EKÁER szám azonosító validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class EkaerIdTypeValidation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(
            minLength: 15,
            maxLength: 15,
            pattern: '[E]{1}[0-9]{6}[0-9A-F]{8}',
        );
    }
}
