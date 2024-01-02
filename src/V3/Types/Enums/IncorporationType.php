<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Gazdasági típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum IncorporationType implements EnumContract
{
    use EnumConcern;

    /**
     * Gazdasági társaság.
     */
    case ORGANIZATION;

    /**
     * Egyéni vállalkozó.
     */
    case SELF_EMPLOYED;

    /**
     * Adószámos magánszemély.
     */
    case TAXABLE_PERSON;
}
