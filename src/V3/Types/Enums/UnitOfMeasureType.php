<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Mennyiség egység típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum UnitOfMeasureType: string
{
    /**
     * Darab.
     */
    case PIECE = 'PIECE';

    /**
     * Kilogramm.
     */
    case KILOGRAM = 'KILOGRAM';

    /**
     * Metrikus tonna.
     */
    case TON = 'TON';

    /**
     * Kilowatt óra.
     */
    case KWH = 'KWH';

    /**
     * Nap.
     */
    case DAY = 'DAY';

    /**
     * Óra.
     */
    case HOUR = 'HOUR';

    /**
     * Perc.
     */
    case MINUTE = 'MINUTE';

    /**
     * Hónap.
     */
    case MONTH = 'MONTH';

    /**
     * Liter.
     */
    case LITER = 'LITER';

    /**
     * Kilométer.
     */
    case KILOMETER = 'KILOMETER';

    /**
     * Köbméter.
     */
    case CUBIC_METER = 'CUBIC_METER';

    /**
     * Méter.
     */
    case METER = 'METER';

    /**
     * Folyóméter.
     */
    case LINEAR_METER = 'LINEAR_METER';

    /**
     * Karton.
     */
    case CARTON = 'CARTON';

    /**
     * Csomag.
     */
    case PACK = 'PACK';

    /**
     * Saját mennyiségi egység megnevezés.
     */
    case OWN = 'OWN';
}
