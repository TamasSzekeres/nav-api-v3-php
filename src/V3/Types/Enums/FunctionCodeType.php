<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Funkciókód típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum FunctionCodeType implements EnumContract
{
    use EnumConcern;

    /**
     * Sikeres művelet.
     */
    case OK;

    /**
     * Hiba.
     */
    case ERROR;
}
