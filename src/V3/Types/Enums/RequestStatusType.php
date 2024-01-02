<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * A kérés feldolgozási státusza.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum RequestStatusType implements EnumContract
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
     * Feldolgozás befejezve.
     */
    case FINISHED;

    /**
     * Lekérdezve.
     */
    case NOTIFIED;
}
