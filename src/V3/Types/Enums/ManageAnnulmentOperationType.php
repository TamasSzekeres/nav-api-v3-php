<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Technikai érvénytelenítés műveleti típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum ManageAnnulmentOperationType implements EnumContract
{
    use EnumConcern;

    /**
     * Korábbi adatszolgáltatás technikai érvénytelenítése.
     */
    case ANNUL;
}
