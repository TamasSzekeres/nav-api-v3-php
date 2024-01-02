<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Metrika típusának leírója.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum MetricTypeType implements EnumContract
{
    use EnumConcern;

    /**
     * Növekmény típusú metrika.
     */
    case COUNTER;

    /**
     * Pillanatkép típusú metrika.
     */
    case GAUGE;

    /**
     * Kvantilis típusú, eloszlást mérő metrika.
     */
    case HISTOGRAM;

    /**
     * Összegző érték típusú metrika.
     */
    case SUMMARY;
}
