<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Számla megjelenési formája típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum InvoiceAppearanceType
{
    /**
     * Papír alapú számla.
     */
    case PAPER;

    /**
     * Elektronikus formában előállított, nem EDI számla.
     */
    case ELECTRONIC;

    /**
     * EDI számla.
     */
    case EDI;

    /**
     * A szoftver nem képes azonosítani vagy a kiállításkor nem ismert.
     */
    case UNKNOWN;
}
