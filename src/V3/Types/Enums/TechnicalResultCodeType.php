<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Technikai eredmény kód típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum TechnicalResultCodeType implements EnumContract
{
    use EnumConcern;

    /**
     * Kritikus hiba.
     */
    case CRITICAL;

    /**
     * Hiba.
     */
    case ERROR;
}
