<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

/**
 * Egyszerűsített számla esetén kitöltendő tétel érték adatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class LineAmountsSimplifiedType extends BaseType
{
    public function __construct(
        /**
         * @var VatRateType Adómérték vagy adómentesség jelölése.
         */
        public VatRateType $lineVatRate,

        /**
         * @var float Tétel bruttó értéke a számla pénznemében.
         */
        #[MonetaryTypeValidation]
        public float $lineGrossAmountSimplified,

        /**
         * @var float Tétel bruttó értéke forintban.
         */
        #[MonetaryTypeValidation]
        public float $lineGrossAmountSimplifiedHUF,
    ) {
        parent::__construct();
    }
}
