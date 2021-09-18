<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Számlaművelet típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class ManageInvoiceOperationType
{
    /**
     * Adatszolgáltatás eredeti számláról.
     */
    const CREATE = 'CREATE';

    /**
     * Adatszolgáltatás az eredeti számlát módosító okiratról.
     */
    const MODIFY = 'MODIFY';

    /**
     * Adatszolgáltatás az eredeti számla érvénytelenítéséről.
     */
    const STORNO = 'STORNO';
}
