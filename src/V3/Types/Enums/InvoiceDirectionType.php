<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Kimenő vagy bejövő számla keresési paramétere.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceDirectionType
{
    /**
     * Bejövő (vevő oldali) számla keresési paramétere.
     */
    const INBOUND = 'INBOUND';

    /**
     * Kimenő (kiállító oldali) számla keresési paramétere.
     */
    const OUTBOUND = 'OUTBOUND';
}
