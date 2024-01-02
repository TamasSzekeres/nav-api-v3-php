<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Díjtétel egység típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum ProductFeeMeasuringUnitType implements EnumContract
{
    use EnumConcern;

    /**
     * Darab.
     */
    case DARAB;

    /**
     * Kilogramm.
     */
    case KG;
}
