<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

use JMS\Serializer\Annotation\AnnotationUtilsTrait;

use function get_defined_vars;

/**
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
final class StringValidation
{
    use AnnotationUtilsTrait;

    public function __construct(
        public int $minLength,
        public int $maxLength,
        public ?string $pattern = null
    ) {
        $this->loadAnnotationParameters(get_defined_vars());
    }
}
