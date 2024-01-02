<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Termékdíj összesítés típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum ProductFeeOperationType implements EnumContract
{
    use EnumConcern;

    /**
     * Visszaigénylés.
     */
    case REFUND;

    /**
     * Raktárba szállítás.
     */
    case DEPOSIT;
}
