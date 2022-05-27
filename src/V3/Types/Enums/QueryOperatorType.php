<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Relációs művelet típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
enum QueryOperatorType
{
    /**
     * Egyenlőség.
     */
    case EQ;

    /**
     * Nagyobb mint reláció.
     */
    case GT;

    /**
     * Nagyobb vagy egyenlő reláció.
     */
    case GTE;

    /**
     * Kisebb mint reláció.
     */
    case LT;

    /**
     * Kisebb vagy egyenlő reláció.
     */
    case LTE;
}
