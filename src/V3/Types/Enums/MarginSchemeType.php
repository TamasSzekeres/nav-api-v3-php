<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Különbözet szerinti szabályozás típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum MarginSchemeType: string
{
    /**
     * Utazási irodák.
     */
    case TRAVEL_AGENCY = 'TRAVEL_AGENCY';

    /**
     * Használt cikkek.
     */
    case SECOND_HAND = 'SECOND_HAND';

    /**
     * Műalkotások.
     */
    case ARTWORK = 'ARTWORK';

    /**
     * Gyűjteménydarabok és régiségek.
     */
    case ANTIQUES = 'ANTIQUES';
}
