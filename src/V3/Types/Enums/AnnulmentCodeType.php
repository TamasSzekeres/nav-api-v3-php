<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Technikai érvénytelenítés kód típusa.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum AnnulmentCodeType: string
{
    /**
     * Hibás adattartalom miatti technikai érvénytelenítés.
     */
    case ERRATIC_DATA = 'ERRATIC_DATA';

    /**
     * Hibás számlaszám miatti technikai érvénytelenítés.
     */
    case ERRATIC_INVOICE_NUMBER = 'ERRATIC_INVOICE_NUMBER';

    /**
     * Hibás számla kiállítási dátum miatti technikai érvénytelenítés.
     */
    case ERRATIC_INVOICE_ISSUE_DATE = 'ERRATIC_INVOICE_ISSUE_DATE';

    /**
     * Hibás elektronikus számla hash érték miatti technikai érvénytelenítés.
     */
    case ERRATIC_ELECTRONIC_HASH_VALUE = 'ERRATIC_ELECTRONIC_HASH_VALUE';
}
