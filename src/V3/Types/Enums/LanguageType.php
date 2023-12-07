<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Nyelv megnevezés típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum LanguageType: string
{
    /**
     * Magyar nyelv.
     */
    case HU = 'HU';

    /**
     * Angol nyelv.
     */
    case EN = 'EN';

    /**
     * Német nyelv.
     */
    case DE = 'DE';
}
