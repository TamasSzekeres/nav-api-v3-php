<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A kérés feldolgozási státusza.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum RequestStatusType
{
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
