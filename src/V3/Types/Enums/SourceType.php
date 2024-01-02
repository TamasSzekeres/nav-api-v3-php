<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Az adatszolgáltatás forrása.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum SourceType implements EnumContract
{
    use EnumConcern;

    /**
     * Webes adatszolgáltatás.
     */
    case WEB;

    /**
     * Kézi XML feltöltés.
     */
    case XML;

    /**
     * Gép-gép adatkapcsolati adatszolgáltatás.
     */
    case MGM;

    /**
     * Online pénztárgépes adatszolgáltatás.
     */
    case OPG;

    /**
     * NAV online számlázó.
     */
    case OSZ;
}
