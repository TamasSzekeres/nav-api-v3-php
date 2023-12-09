<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Kimenő vagy bejövő számla keresési paramétere.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum InvoiceDirectionType: string
{
    /**
     * Bejövő (vevő oldali) számla keresési paramétere.
     */
    case INBOUND = 'INBOUND';

    /**
     * Kimenő (kiállító oldali) számla keresési paramétere.
     */
    case OUTBOUND = 'OUTBOUND';
}
