<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * A lekérdezett számla `requestVersion` értéke.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum OriginalRequestVersionType: string implements EnumContract
{
    case VERSION_1_0 = '1.0';
    case VERSION_1_1 = '1.1';
    case VERSION_2_0 = '2.0';
    case VERSION_3_0 = '3.0';

    static function fromValue(mixed $value): EnumContract
    {
        return self::from((string)$value);
    }
}
