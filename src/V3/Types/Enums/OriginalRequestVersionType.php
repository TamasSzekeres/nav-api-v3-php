<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A lekérdezett számla `requestVersion` értéke.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum OriginalRequestVersionType
{
    case VERSION_1_0;
    case VERSION_1_1;
    case VERSION_2_0;
    case VERSION_3_0;

    public function toVersionString(): string
    {
        return match($this) {
            self::VERSION_1_0 => '1.0',
            self::VERSION_1_1 => '1.1',
            self::VERSION_2_0 => '2.0',
            self::VERSION_3_0 => '3.0',
        };
    }
}
