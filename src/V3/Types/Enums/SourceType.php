<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Az adatszolgáltatás forrása.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class SourceType
{
    /**
     * Webes adatszolgáltatás.
     */
    const WEB = 'WEB';

    /**
     * Kézi XML feltöltés.
     */
    const XML = 'XML';

    /**
     * Gép-gép adatkapcsolati adatszolgáltatás.
     */
    const MGM = 'MGM';

    /**
     * Online pénztárgépes adatszolgáltatás.
     */
    const OPG = 'OPG';

    /**
     * NAV online számlázó.
     */
    const OSZ = 'OSZ';
}
