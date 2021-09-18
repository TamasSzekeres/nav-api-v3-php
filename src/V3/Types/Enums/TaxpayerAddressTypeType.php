<?php

namespace LightSideSoftware\NavApi\V3\Types\Enums;

/**
 * Adózói cím típus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class TaxpayerAddressTypeType
{
    /**
     * Székhely.
     */
    const HQ = 'HQ';

    /**
     * Telephely.
     */
    const SITE = 'SITE';

    /**
     * Fióktelep.
     */
    const BRANCH = 'BRANCH';
}
