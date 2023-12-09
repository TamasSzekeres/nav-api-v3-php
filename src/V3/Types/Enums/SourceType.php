<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Az adatszolgáltatás forrása.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum SourceType: string
{
    /**
     * Webes adatszolgáltatás.
     */
    case WEB = 'WEB';

    /**
     * Kézi XML feltöltés.
     */
    case XML = 'XML';

    /**
     * Gép-gép adatkapcsolati adatszolgáltatás.
     */
    case MGM = 'MGM';

    /**
     * Online pénztárgépes adatszolgáltatás.
     */
    case OPG = 'OPG';

    /**
     * NAV online számlázó.
     */
    case OSZ = 'OSZ';
}
