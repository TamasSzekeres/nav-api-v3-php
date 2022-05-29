<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Metrika típusának leírója.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum MetricTypeType: string
{
    /**
     * Növekmény típusú metrika.
     */
    case COUNTER = 'COUNTER';

    /**
     * Pillanatkép típusú metrika.
     */
    case GAUGE = 'GAUGE';

    /**
     * Kvantilis típusú, eloszlást mérő metrika.
     */
    case HISTOGRAM = 'HISTOGRAM';

    /**
     * Összegző érték típusú metrika.
     */
    case SUMMARY = 'SUMMARY';
}
