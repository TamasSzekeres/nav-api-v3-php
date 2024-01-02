<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Technikai érvénytelenítés kód típusa.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum AnnulmentCodeType implements EnumContract
{
    use EnumConcern;

    /**
     * Hibás adattartalom miatti technikai érvénytelenítés.
     */
    case ERRATIC_DATA;

    /**
     * Hibás számlaszám miatti technikai érvénytelenítés.
     */
    case ERRATIC_INVOICE_NUMBER;

    /**
     * Hibás számla kiállítási dátum miatti technikai érvénytelenítés.
     */
    case ERRATIC_INVOICE_ISSUE_DATE;

    /**
     * Hibás elektronikus számla hash érték miatti technikai érvénytelenítés.
     */
    case ERRATIC_ELECTRONIC_HASH_VALUE;
}
