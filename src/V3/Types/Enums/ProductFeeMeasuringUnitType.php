<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Díjtétel egység típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum ProductFeeMeasuringUnitType: string
{
    /**
     * Darab.
     */
    case DARAB = 'DARAB';

    /**
     * Kilogramm.
     */
    case KG = 'KG';
}
