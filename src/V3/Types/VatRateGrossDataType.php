<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

/**
 * Adott adómértékhez tartozó bruttó adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class VatRateGrossDataType extends BaseType
{
    public function __construct(
        /**
         * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás bruttó összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        public float $vatRateGrossAmount,

        /**
         * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás bruttó összege forintban.
         */
        #[MonetaryTypeValidation]
        public float $vatRateGrossAmountHUF,
    ) {
        parent::__construct();
    }
}
