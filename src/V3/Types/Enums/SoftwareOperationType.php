<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számlázóprogram működési típusa (lokális program vagy online számlázó szolgáltatás).
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum SoftwareOperationType: string
{
    /**
     * Lokális program.
     */
    case LOCAL_SOFTWARE = 'LOCAL_SOFTWARE';

    /**
     * Online számlázó szolgáltatás.
     */
    case ONLINE_SERVICE = 'ONLINE_SERVICE';
}
