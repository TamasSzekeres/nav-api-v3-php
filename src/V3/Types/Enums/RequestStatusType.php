<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A kérés feldolgozási státusza.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum RequestStatusType: string
{
    /**
     * Befogadva.
     */
    case RECEIVED = 'RECEIVED';

    /**
     * Feldolgozás alatt.
     */
    case PROCESSING = 'PROCESSING';

    /**
     * Elmentve.
     */
    case SAVED = 'SAVED';

    /**
     * Feldolgozás befejezve.
     */
    case FINISHED = 'FINISHED';

    /**
     * Lekérdezve.
     */
    case NOTIFIED = 'NOTIFIED';
}
