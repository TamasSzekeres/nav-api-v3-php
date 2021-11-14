<?php

namespace LightSideSoftware\NavApi\V3\Types\Annotations;

/**
 * @Annotation
 * @Target({"PROPERTY", "ANNOTATION"})
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
final class StringValidation
{
    public int $minLength;
    public int $maxLength;
    public string $pattern;
}
