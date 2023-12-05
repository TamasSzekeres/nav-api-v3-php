<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Legfeljebb 1024 karaktert tartalmazó szöveg típus validálása.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class SimpleText1024NotBlankTypeValidation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(minLength: 1, maxLength: 1024, pattern: '.*[^\s].*');
    }
}
