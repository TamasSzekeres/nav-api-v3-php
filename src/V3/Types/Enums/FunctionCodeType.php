<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Funkciókód típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum FunctionCodeType: string
{
    /**
     * Sikeres művelet.
     */
    case OK = 'OK';

    /**
     * Hiba.
     */
    case ERROR = 'ERROR';
}
