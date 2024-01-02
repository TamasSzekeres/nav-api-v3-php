<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Relációs művelet típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum QueryOperatorType implements EnumContract
{
    use EnumConcern;

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
