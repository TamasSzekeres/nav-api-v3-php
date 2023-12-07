<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

/**
 * Adott adómértékhez tartozó nettó adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class VatRateNetDataType extends BaseType
{
    public function __construct(
        /**
         * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás nettó összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        public float $vatRateNetAmount,

        /**
         * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás nettó összege forintban.
         */
        #[MonetaryTypeValidation]
        public float $vatRateNetAmountHUF,
    ) {
        parent::__construct();
    }
}
