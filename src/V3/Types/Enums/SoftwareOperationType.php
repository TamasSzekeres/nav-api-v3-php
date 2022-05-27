<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számlázóprogram működési típusa (lokális program vagy online számlázó szolgáltatás).
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum SoftwareOperationType
{
    /**
     * Lokális program.
     */
    case LOCAL_SOFTWARE;

    /**
     * Online számlázó szolgáltatás.
     */
    case ONLINE_SERVICE;
}
