<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * A számlatétel módosítás típusa.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum LineOperationType implements EnumContract
{
    use EnumConcern;

    /**
     * Létrehozás.
     */
    case CREATE;

    /**
     * Módosítás.
     */
    case MODIFY;
}
