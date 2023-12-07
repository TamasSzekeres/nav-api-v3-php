<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számla feldolgozási státusza.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum InvoiceStatusType
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
     * Kész.
     */
    case DONE;

    /**
     * Kihagyva.
     */
    case ABORTED;
}
