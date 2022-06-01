<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Termékáram típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum ProductStreamType: string
{
    /**
     * Akkumulátor.
     */
    case BATTERY = 'BATTERY';

    /**
     * Csomagolószer.
     */
    case PACKAGING = 'PACKAGING';

    /**
     * Egyéb kőolajtermék.
     */
    case OTHER_PETROL = 'OTHER_PETROL';

    /**
     * Az elektromos, elektronikai berendezés.
     */
    case ELECTRONIC = 'ELECTRONIC';

    /**
     * Gumiabroncs.
     */
    case TIRE = 'TIRE';

    /**
     * Reklámhordozó papír.
     */
    case COMMERCIAL = 'COMMERCIAL';

    /**
     * Az egyéb műanyag termék.
     */
    case PLASTIC = 'PLASTIC';

    /**
     * Egyéb vegyipari termék.
     */
    case OTHER_CHEMICAL = 'OTHER_CHEMICAL';

    /**
     * Irodai papír.
     */
    case PAPER = 'PAPER';
}
