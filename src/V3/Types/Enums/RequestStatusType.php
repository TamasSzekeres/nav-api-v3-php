<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A kérés feldolgozási státusza.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class RequestStatusType
{
    /**
     * Befogadva.
     */
    const RECEIVED = 'RECEIVED';

    /**
     * Feldolgozás alatt.
     */
    const PROCESSING = 'PROCESSING';

    /**
     * Elmentve.
     */
    const SAVED = 'SAVED';

    /**
     * Feldolgozás befejezve.
     */
    const FINISHED = 'FINISHED';

    /**
     * Lekérdezve.
     */
    const NOTIFIED = 'NOTIFIED';
}
