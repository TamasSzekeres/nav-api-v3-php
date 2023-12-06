<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use Attribute;
use DateTimeImmutable;

/**
 * Dátum validálása az Online Számla rendszerben.
 *
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
final class InvoiceDateTypeValidation extends DateTimeValidation
{
    public function __construct()
    {
        parent::__construct(minInclusive: new DateTimeImmutable('2010-01-01 00:00:00'));
    }
}
