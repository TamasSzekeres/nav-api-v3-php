<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * A számlázóprogram működési típusa (lokális program vagy online számlázó szolgáltatás).
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum SoftwareOperationType implements EnumContract
{
    use EnumConcern;

    /**
     * Lokális program.
     */
    case LOCAL_SOFTWARE;

    /**
     * Online számlázó szolgáltatás.
     */
    case ONLINE_SERVICE;
}
