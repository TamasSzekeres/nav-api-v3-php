<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Nyelv megnevezés típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum LanguageType implements EnumContract
{
    use EnumConcern;

    /**
     * Magyar nyelv.
     */
    case HU;

    /**
     * Angol nyelv.
     */
    case EN;

    /**
     * Német nyelv.
     */
    case DE;
}
