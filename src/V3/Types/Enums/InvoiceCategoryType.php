<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számla típusa.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum InvoiceCategoryType
{
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
