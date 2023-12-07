<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Üzleti eredmény kód típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum BusinessResultCodeType: string
{
    /**
     * Hiba.
     */
    case ERROR = 'ERROR';

    /**
     * Figyelmeztetés.
     */
    case WARN = 'WARN';

    /**
     * Tájékoztatás.
     */
    case INFO = 'INFO';
}
