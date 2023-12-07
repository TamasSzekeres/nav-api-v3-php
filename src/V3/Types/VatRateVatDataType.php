<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

/**
 * Adott adómértékhez tartozó ÁFA adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class VatRateVatDataType extends BaseType
{
    public function __construct(
        /**
         * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás ÁFA összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        public float $vatRateVatAmount,

        /**
         * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás ÁFA összege forintban.
         */
        #[MonetaryTypeValidation]
        public float $vatRateVatAmountHUF,
    ) {
        parent::__construct();
    }
}
