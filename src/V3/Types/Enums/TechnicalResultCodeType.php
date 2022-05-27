<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Technikai eredmény kód típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum TechnicalResultCodeType
{
    /**
     * Kritikus hiba.
     */
    case CRITICAL;

    /**
     * Hiba.
     */
    case ERROR;
}
