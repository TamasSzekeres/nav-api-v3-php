<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számla feldolgozási státusza.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum InvoiceStatusType: string
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
     * Kész.
     */
    case DONE = 'DONE';

    /**
     * Kihagyva.
     */
    case ABORTED = 'ABORTED';
}
