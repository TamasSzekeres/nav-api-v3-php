<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Adózói cím típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum TaxpayerAddressTypeType: string
{
    /**
     * Székhely.
     */
    case HQ = 'HQ';

    /**
     * Telephely.
     */
    case SITE = 'SITE';

    /**
     * Fióktelep.
     */
    case BRANCH = 'BRANCH';
}
