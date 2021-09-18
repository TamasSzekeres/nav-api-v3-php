<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * A számlázóprogram működési típusa (lokális program vagy online számlázó szolgáltatás).
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class SoftwareOperationType
{
    /**
     * Lokális program.
     */
    const LOCAL_SOFTWARE = 'LOCAL_SOFTWARE';

    /**
     * Online számlázó szolgáltatás.
     */
    const ONLINE_SERVICE = 'ONLINE_SERVICE';
}
