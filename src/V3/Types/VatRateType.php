<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\MarginSchemeType;

/**
 * Az adómérték vagy az adómentes értékesítés jelölése.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class VatRateType extends BaseType
{
    public function __construct(
        /**
         * @var float Az alkalmazott adó mértéke - ÁFA tv. 169. § j).
         */
        #[FloatValidation(minInclusive: 0, maxInclusive: 1, totalDigits: 5, fractionDigits: 4)]
        public float $vatPercentage,

        /**
         * @var float ÁFA tartalom egyszerűsített számla esetén.
         */
        #[FloatValidation(minInclusive: 0, maxInclusive: 1, totalDigits: 5, fractionDigits: 4)]
        public float $vatContent,

        /**
         * @var DetailedReasonType Az adómentesség jelölése - ÁFA tv. 169. § m)
         */
        public DetailedReasonType $vatExemption,

        /**
         * @var DetailedReasonType Az ÁFA törvény hatályán kívüli.
         */
        public DetailedReasonType $vatOutOfScope,

        /**
         * @var bool A belföldi fordított adózás jelölése - ÁFA tv. 142. §.
         */
        public bool $vatDomesticReverseCharge,

        /**
         * @var MarginSchemeType Különbözet szerinti szabályozás jelölése - ÁFA tv. 169. § p) q).
         */
        public MarginSchemeType $marginSchemeIndicator,

        /**
         * @var VatAmountMismatchType Adóalap és felszámított adó eltérésének esetei.
         */
        public VatAmountMismatchType $vatAmountMismatch,

        /**
         * @var bool Nincs felszámított áfa a 17. § alapján.
         */
        public bool $noVatCharge,
    ) {
        parent::__construct();
    }
}
