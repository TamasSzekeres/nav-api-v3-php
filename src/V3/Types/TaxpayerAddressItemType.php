<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Enums\TaxpayerAddressTypeType;

/**
 * Adózói címsor adat.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class TaxpayerAddressItemType extends BaseType
{
    public function __construct(
        /**
         * @var TaxpayerAddressTypeType Adózói cím típus.
         */
        public TaxpayerAddressTypeType $taxpayerAddressType,

        /**
         * @var DetailedAddressType Az adózó címadatai.
         */
        public DetailedAddressType $taxpayerAddress,
    ) {
        parent::__construct();
    }
}
