<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * ÁFA kód validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class VatCodeTypeValidation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(
            minLength: 1,
            maxLength: 1,
            pattern: '[1-5]{1}',
        );
    }
}
