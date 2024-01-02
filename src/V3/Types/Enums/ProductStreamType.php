<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Termékáram típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum ProductStreamType implements EnumContract
{
    use EnumConcern;

    /**
     * Akkumulátor.
     */
    case BATTERY;

    /**
     * Csomagolószer.
     */
    case PACKAGING;

    /**
     * Egyéb kőolajtermék.
     */
    case OTHER_PETROL;

    /**
     * Az elektromos, elektronikai berendezés.
     */
    case ELECTRONIC;

    /**
     * Gumiabroncs.
     */
    case TIRE;

    /**
     * Reklámhordozó papír.
     */
    case COMMERCIAL;

    /**
     * Az egyéb műanyag termék.
     */
    case PLASTIC;

    /**
     * Egyéb vegyipari termék.
     */
    case OTHER_CHEMICAL;

    /**
     * Irodai papír.
     */
    case PAPER;
}
