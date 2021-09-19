<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számla típusa.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceCategoryType
{
    /**
     * Normál (nem egyszerűsített és nem gyűjtő) számla.
     */
    const NORMAL = 'NORMAL';

    /**
     * Egyszerűsített számla.
     */
    const SIMPLIFIED = 'SIMPLIFIED';

    /**
     * Gyűjtőszámla.
     */
    const AGGREGATE = 'AGGREGATE';
}
