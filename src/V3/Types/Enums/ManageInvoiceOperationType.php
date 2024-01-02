<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Számlaművelet típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum ManageInvoiceOperationType implements EnumContract
{
    use EnumConcern;

    /**
     * Adatszolgáltatás eredeti számláról.
     */
    case CREATE;

    /**
     * Adatszolgáltatás az eredeti számlát módosító okiratról.
     */
    case MODIFY;

    /**
     * Adatszolgáltatás az eredeti számla érvénytelenítéséről.
     */
    case STORNO;
}
