<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számla feldolgozási státusza.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceStatusType
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
     * Kész.
     */
    const DONE = 'DONE';

    /**
     * Kihagyva.
     */
    const ABORTED = 'ABORTED';
}
