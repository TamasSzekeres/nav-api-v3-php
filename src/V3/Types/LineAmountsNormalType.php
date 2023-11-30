<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Normál vagy gyűjtő számla esetén kitöltendő tétel érték adatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class LineAmountsNormalType extends BaseType
{
    public function __construct(
        /**
         * @var LineNetAmountDataType Tétel nettó adatok.
         */
        public LineNetAmountDataType $lineNetAmountData,

        /**
         * @var VatRateType Adómérték vagy adómentesség jelölése.
         */
        public VatRateType $lineVatRate,

        /**
         * @var ?LineVatDataType Tétel ÁFA adatok.
         */
        public ?LineVatDataType $lineVatData = null,

        /**
         * @var ?LineGrossAmountDataType Tétel bruttó adatok.
         */
        public ?LineGrossAmountDataType $lineGrossAmountData = null,
    ) {
        parent::__construct();
    }
}
