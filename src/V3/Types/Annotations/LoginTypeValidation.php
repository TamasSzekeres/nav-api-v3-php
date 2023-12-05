<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Felhasználónév típus validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class LoginTypeValidation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(
            minLength: 6,
            maxLength: 15,
            pattern: '[a-zA-Z0-9]{6,15}',
        );
    }
}
