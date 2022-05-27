<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Az adatszolgáltatás forrása.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum SourceType
{
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
