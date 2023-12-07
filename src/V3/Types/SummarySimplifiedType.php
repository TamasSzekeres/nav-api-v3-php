<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

/**
 * Egyszerűsített számla összesítés.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class SummarySimplifiedType extends BaseType
{
    public function __construct(
        /**
         * @var VatRateType Adómérték vagy adómentesség jelölése.
         */
        public VatRateType $vatRate,

        /**
         * @var float Az adott adótartalomhoz tartozó értékesítés vagy szolgáltatásnyújtás bruttó összege a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        public float $vatContentGrossAmount,

        /**
         * @var float Az adott adótartalomhoz tartozó értékesítés vagy szolgáltatásnyújtás bruttó összege forintban.
         */
        #[MonetaryTypeValidation]
        public float $vatContentGrossAmountHUF,
    ) {
        parent::__construct();
    }
}
