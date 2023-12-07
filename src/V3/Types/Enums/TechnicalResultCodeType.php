<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Technikai eredmény kód típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum TechnicalResultCodeType: string
{
    /**
     * Kritikus hiba.
     */
    case CRITICAL = 'CRITICAL';

    /**
     * Hiba.
     */
    case ERROR = 'ERROR';
}
