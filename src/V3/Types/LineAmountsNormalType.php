<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;

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
        #[SkipWhenEmpty]
        public ?LineVatDataType $lineVatData = null,

        /**
         * @var ?LineGrossAmountDataType Tétel bruttó adatok.
         */
        #[SkipWhenEmpty]
        public ?LineGrossAmountDataType $lineGrossAmountData = null,
    ) {
        parent::__construct();
    }
}
