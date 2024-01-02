<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Üzleti eredmény kód típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum BusinessResultCodeType implements EnumContract
{
    use EnumConcern;

    /**
     * Hiba.
     */
    case ERROR;

    /**
     * Figyelmeztetés.
     */
    case WARN;

    /**
     * Tájékoztatás.
     */
    case INFO;
}
