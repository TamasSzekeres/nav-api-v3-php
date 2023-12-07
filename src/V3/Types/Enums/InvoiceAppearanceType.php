<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Számla megjelenési formája típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum InvoiceAppearanceType: string
{
    /**
     * Papír alapú számla.
     */
    case PAPER = 'PAPER';

    /**
     * Elektronikus formában előállított, nem EDI számla.
     */
    case ELECTRONIC = 'ELECTRONIC';

    /**
     * EDI számla.
     */
    case EDI = 'EDI';

    /**
     * A szoftver nem képes azonosítani vagy a kiállításkor nem ismert.
     */
    case UNKNOWN = 'UNKNOWN';
}
