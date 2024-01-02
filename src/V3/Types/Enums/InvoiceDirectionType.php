<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Kimenő vagy bejövő számla keresési paramétere.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum InvoiceDirectionType implements EnumContract
{
    use EnumConcern;

    /**
     * Bejövő (vevő oldali) számla keresési paramétere.
     */
    case INBOUND;

    /**
     * Kimenő (kiállító oldali) számla keresési paramétere.
     */
    case OUTBOUND;
}
