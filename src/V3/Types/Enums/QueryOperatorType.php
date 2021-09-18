<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Relációs művelet típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class QueryOperatorType
{
    /**
     * Egyenlőség.
     */
    const EQ = 'EQ';

    /**
     * Nagyobb mint reláció.
     */
    const GT = 'GT';

    /**
     * Nagyobb vagy egyenlő reláció.
     */
    const GTE = 'GTE';

    /**
     * Kisebb mint reláció.
     */
    const LT = 'LT';

    /**
     * Kisebb vagy egyenlő reláció.
     */
    const LTE = 'LTE';
}
