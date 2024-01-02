<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Mennyiség egység típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum UnitOfMeasureType implements EnumContract
{
    use EnumConcern;

    /**
     * Darab.
     */
    case PIECE;

    /**
     * Kilogramm.
     */
    case KILOGRAM;

    /**
     * Metrikus tonna.
     */
    case TON;

    /**
     * Kilowatt óra.
     */
    case KWH;

    /**
     * Nap.
     */
    case DAY;

    /**
     * Óra.
     */
    case HOUR;

    /**
     * Perc.
     */
    case MINUTE;

    /**
     * Hónap.
     */
    case MONTH;

    /**
     * Liter.
     */
    case LITER;

    /**
     * Kilométer.
     */
    case KILOMETER;

    /**
     * Köbméter.
     */
    case CUBIC_METER;

    /**
     * Méter.
     */
    case METER;

    /**
     * Folyóméter.
     */
    case LINEAR_METER;

    /**
     * Karton.
     */
    case CARTON;

    /**
     * Csomag.
     */
    case PACK;

    /**
     * Saját mennyiségi egység megnevezés.
     */
    case OWN;
}
