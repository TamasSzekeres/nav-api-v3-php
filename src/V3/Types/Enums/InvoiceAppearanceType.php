<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Számla megjelenési formája típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum InvoiceAppearanceType implements EnumContract
{
    use EnumConcern;

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
