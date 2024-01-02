<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types\Enums;

use LightSideSoftware\NavApi\V3\Base\EnumConcern;
use LightSideSoftware\NavApi\V3\Base\EnumContract;

/**
 * Adózói cím típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum TaxpayerAddressTypeType implements EnumContract
{
    use EnumConcern;

    /**
     * Székhely.
     */
    case HQ;

    /**
     * Telephely.
     */
    case SITE;

    /**
     * Fióktelep.
     */
    case BRANCH;
}
