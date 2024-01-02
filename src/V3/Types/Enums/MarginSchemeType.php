<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Különbözet szerinti szabályozás típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum MarginSchemeType implements EnumContract
{
    use EnumConcern;

    /**
     * Utazási irodák.
     */
    case TRAVEL_AGENCY;

    /**
     * Használt cikkek.
     */
    case SECOND_HAND;

    /**
     * Műalkotások.
     */
    case ARTWORK;

    /**
     * Gyűjteménydarabok és régiségek.
     */
    case ANTIQUES;
}
