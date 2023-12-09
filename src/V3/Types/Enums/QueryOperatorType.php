<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Relációs művelet típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum QueryOperatorType: string
{
    /**
     * Egyenlőség.
     */
    case EQ = 'EQ';

    /**
     * Nagyobb mint reláció.
     */
    case GT = 'GT';

    /**
     * Nagyobb vagy egyenlő reláció.
     */
    case GTE = 'GTE';

    /**
     * Kisebb mint reláció.
     */
    case LT = 'LT';

    /**
     * Kisebb vagy egyenlő reláció.
     */
    case LTE = 'LTE';
}
