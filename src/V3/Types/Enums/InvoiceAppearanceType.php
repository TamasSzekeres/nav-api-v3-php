<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Számla megjelenési formája típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceAppearanceType
{
    /**
     * Papír alapú számla.
     */
    const PAPER = 'PAPER';

    /**
     * Elektronikus formában előállított, nem EDI számla.
     */
    const ELECTRONIC = 'ELECTRONIC';

    /**
     * EDI számla.
     */
    const EDI = 'EDI';

    /**
     * A szoftver nem képes azonosítani vagy a kiállításkor nem ismert.
     */
    const UNKNOWN = 'UNKNOWN';
}
