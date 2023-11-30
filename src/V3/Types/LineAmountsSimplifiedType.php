<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

/**
 * Egyszerűsített számla esetén kitöltendő tétel érték adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
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
        #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
        public float $lineGrossAmountSimplified,

        /**
         * @var float Tétel bruttó értéke forintban.
         */
        #[FloatValidation(totalDigits: 18, fractionDigits: 2)]
        public float $lineGrossAmountSimplifiedHUF,
    ) {
        parent::__construct();
    }
}
