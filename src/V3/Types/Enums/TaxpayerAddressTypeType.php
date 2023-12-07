<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Adózói cím típus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
enum TaxpayerAddressTypeType
{
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
