<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Név kereső paraméter validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class QueryNameTypeValidation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(
            minLength: 5,
            maxLength: 512,
            pattern: '.*[^\s].*',
        );
    }
}
