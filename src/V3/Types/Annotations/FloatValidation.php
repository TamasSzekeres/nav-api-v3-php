<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use JMS\Serializer\Annotation\AnnotationUtilsTrait;

/**
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
final class FloatValidation
{
    use AnnotationUtilsTrait;

    public function __construct(
        public ?float $minExclusive = null,
        public ?float $maxExclusive = null,
        public ?float $minInclusive = null,
        public ?float $maxInclusive = null,
        public ?int $totalDigits = null,
        public ?int $fractionDigits = null
    ) {
        $this->loadAnnotationParameters(get_defined_vars());
    }
}
