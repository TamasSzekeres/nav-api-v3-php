<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Adott adómértékhez tartozó ÁFA adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class VatRateVatDataType extends BaseType
{
    public function __construct(
        /**
         * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás ÁFA összege a számla pénznemében.
         */
        #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
        public float $vatRateVatAmount,

        /**
         * @var float Az adott adómértékhez tartozó értékesítés vagy szolgáltatásnyújtás ÁFA összege forintban.
         */
        #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
        public float $vatRateVatAmountHUF,
    ) {
        parent::__construct();
    }
}
