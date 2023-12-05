<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * SHA256 kód validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class SHA256TypeValidation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(minLength: 64, maxLength: 64, pattern: '[0-9A-F]{64}');
    }
}
