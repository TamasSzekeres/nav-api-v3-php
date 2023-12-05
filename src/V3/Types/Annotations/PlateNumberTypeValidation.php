<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Kereskedelmi gépjármű forgalmi rendszáma (csak betűk és számok) validálására szolgáló annotáció.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class PlateNumberTypeValidation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(
            minLength: 2,
            maxLength: 30,
            pattern: '[A-Z0-9ÖŐÜŰ]{2,30}',
        );
    }
}
