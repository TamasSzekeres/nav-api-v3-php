<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Adott tételsor termékértékesítés vagy szolgáltatás nyújtás jellegének jelzése.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum LineNatureIndicatorType implements EnumContract
{
    use EnumConcern;

    /**
     * Termékértékesítés.
     */
    case PRODUCT;

    /**
     * Szolgáltatás nyújtás.
     */
    case SERVICE;

    /**
     * Egyéb, nem besorolható.
     */
    case OTHER;
}
