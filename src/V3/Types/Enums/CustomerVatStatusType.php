<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Vevő ÁFA szerinti státusz típusa.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum CustomerVatStatusType: string
{
    /**
     * Belföldi ÁFA alany.
     */
    case DOMESTIC = 'DOMESTIC';

    /**
     * Egyéb (belföldi nem ÁFA alany, nem természetes személy, külföldi ÁFA alany és külföldi nem ÁFA alany, nem természetes személy).
     */
    case OTHER = 'OTHER';

    /**
     * Nem ÁFA alany (belföldi vagy külföldi) természetes személy.
     */
    case PRIVATE_PERSON = 'PRIVATE_PERSON';
}
