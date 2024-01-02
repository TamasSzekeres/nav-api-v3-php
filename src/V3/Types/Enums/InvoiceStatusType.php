<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * A számla feldolgozási státusza.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum InvoiceStatusType implements EnumContract
{
    use EnumConcern;

    /**
     * Befogadva.
     */
    case RECEIVED;

    /**
     * Feldolgozás alatt.
     */
    case PROCESSING;

    /**
     * Elmentve.
     */
    case SAVED;

    /**
     * Kész.
     */
    case DONE;

    /**
     * Kihagyva.
     */
    case ABORTED;
}
