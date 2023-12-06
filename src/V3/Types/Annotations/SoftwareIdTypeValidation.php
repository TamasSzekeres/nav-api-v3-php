<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * A számlázóprogram azonosító validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class SoftwareIdTypeValidation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(
            minLength: 18,
            maxLength: 18,
            pattern: '[0-9A-Z\-]{18}',
        );
    }
}
