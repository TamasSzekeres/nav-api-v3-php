<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Base;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
interface EnumContract
{
    static function fromValue(mixed $value): self;
}
