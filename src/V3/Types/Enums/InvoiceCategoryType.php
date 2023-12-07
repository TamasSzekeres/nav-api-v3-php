<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számla típusa.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum InvoiceCategoryType: string
{
    /**
     * Normál (nem egyszerűsített és nem gyűjtő) számla.
     */
    case NORMAL = 'NORMAL';

    /**
     * Egyszerűsített számla.
     */
    case SIMPLIFIED = 'SIMPLIFIED';

    /**
     * Gyűjtőszámla.
     */
    case AGGREGATE = 'AGGREGATE';
}
