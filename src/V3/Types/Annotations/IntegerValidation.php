<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use JMS\Serializer\Annotation\AnnotationUtilsTrait;

/**
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
final class IntegerValidation
{
    use AnnotationUtilsTrait;

    public function __construct(
        public int $minInclusive,
        public ?int $maxInclusive = null
    ) {
        $this->loadAnnotationParameters(get_defined_vars());
    }
}
