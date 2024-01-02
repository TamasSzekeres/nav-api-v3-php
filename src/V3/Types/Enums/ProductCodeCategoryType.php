<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * A termékkód fajtájának jelölésére szolgáló típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum ProductCodeCategoryType implements EnumContract
{
    use EnumConcern;

    /**
     * Vámtarifa szám VTSZ.
     */
    case VTSZ;

    /**
     * Szolgáltatás jegyzék szám SZJ.
     */
    case SZJ;

    /**
     * KN kód (Kombinált Nómenklatúra, 2658/87/EGK rendelet I. melléklete).
     */
    case KN;

    /**
     * A Jövedéki törvény (2016. évi LXVIII. tv) szerinti e-TKO adminisztratív hivatkozási kódja AHK.
     */
    case AHK;

    /**
     * A termék 343/2011. (XII. 29) Korm. rendelet 1. sz. melléklet A) cím szerinti csomagolószer-katalógus kódja (CsK kód).
     */
    case CSK;

    /**
     * A termék 343/2011. (XII. 29) Korm. rendelet 1. sz. melléklet B) cím szerinti környezetvédelmi termékkódja (Kt kód).
     */
    case KT;

    /**
     * Építményjegyzék szám.
     */
    case EJ;

    /**
     * A Termékek és Szolgáltatások Osztályozási Rendszere (TESZOR) szerinti termékkód - 451/2008/EK rendelet.
     */
    case TESZOR;

    /**
     * A vállalkozás által képzett termékkód.
     */
    case OWN;

    /**
     * Egyéb termékkód.
     */
    case OTHER;
}
