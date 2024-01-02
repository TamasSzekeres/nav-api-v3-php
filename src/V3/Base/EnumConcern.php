<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Base;

use RuntimeException;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
trait EnumConcern
{
    static function fromValue(mixed $value): self
    {
        foreach (self::cases() as $case) {
            if ($case->name === $value) {
                return $case;
            }
        }

        throw new RuntimeException();
    }
}
