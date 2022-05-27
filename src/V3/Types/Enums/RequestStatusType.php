<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A kérés feldolgozási státusza.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
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
