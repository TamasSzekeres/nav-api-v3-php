<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Számlaművelet típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum ManageInvoiceOperationType
{
    /**
     * Adatszolgáltatás eredeti számláról.
     */
    case CREATE;

    /**
     * Adatszolgáltatás az eredeti számlát módosító okiratról.
     */
    case MODIFY;

    /**
     * Adatszolgáltatás az eredeti számla érvénytelenítéséről.
     */
    case STORNO;
}
