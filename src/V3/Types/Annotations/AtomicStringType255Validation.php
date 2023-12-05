<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;

/**
 * Atomi string típus validálás 255 hosszra.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class AtomicStringType255Validation extends StringValidation
{
    public function __construct()
    {
        parent::__construct(minLength: 1, maxLength: 255);
    }
}
