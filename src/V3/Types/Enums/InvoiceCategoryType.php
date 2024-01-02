<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * A számla típusa.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum InvoiceCategoryType implements EnumContract
{
    use EnumConcern;

    /**
     * Normál (nem egyszerűsített és nem gyűjtő) számla.
     */
    case NORMAL;

    /**
     * Egyszerűsített számla.
     */
    case SIMPLIFIED;

    /**
     * Gyűjtőszámla.
     */
    case AGGREGATE;
}
