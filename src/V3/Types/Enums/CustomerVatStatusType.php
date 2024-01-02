<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Vevő ÁFA szerinti státusz típusa.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum CustomerVatStatusType implements EnumContract
{
    use EnumConcern;

    /**
     * Belföldi ÁFA alany.
     */
    case DOMESTIC;

    /**
     * Egyéb (belföldi nem ÁFA alany, nem természetes személy, külföldi ÁFA alany és külföldi nem ÁFA alany, nem természetes személy).
     */
    case OTHER;

    /**
     * Nem ÁFA alany (belföldi vagy külföldi) természetes személy.
     */
    case PRIVATE_PERSON;
}
