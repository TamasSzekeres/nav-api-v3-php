<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use InvalidArgumentException;
use JMS\Serializer\Annotation\Type;
use LightSideSoftware\NavApi\V3\Types\Annotations\RateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Enums\MarginSchemeType;

/**
 * Az adómérték vagy az adómentes értékesítés jelölése.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class VatRateType extends BaseType
{
    public function __construct(
        /**
         * @var ?float Az alkalmazott adó mértéke - ÁFA tv. 169. § j).
         */
        #[RateTypeValidation]
        public ?float $vatPercentage = null,

        /**
         * @var float ÁFA tartalom egyszerűsített számla esetén.
         */
        #[RateTypeValidation]
        public ?float $vatContent = null,

        /**
         * @var ?DetailedReasonType Az adómentesség jelölése - ÁFA tv. 169. § m)
         */
        public ?DetailedReasonType $vatExemption = null,

        /**
         * @var ?DetailedReasonType Az ÁFA törvény hatályán kívüli.
         */
        public ?DetailedReasonType $vatOutOfScope = null,

        /**
         * @var ?bool A belföldi fordított adózás jelölése - ÁFA tv. 142. §.
         */
        public ?bool $vatDomesticReverseCharge = null,

        /**
         * @var ?MarginSchemeType Különbözet szerinti szabályozás jelölése - ÁFA tv. 169. § p) q).
         */
        #[Type("Enum<'LightSideSoftware\NavApi\V3\Types\Enums\MarginSchemeType'>")]
        public ?MarginSchemeType $marginSchemeIndicator = null,

        /**
         * @var ?VatAmountMismatchType Adóalap és felszámított adó eltérésének esetei.
         */
        public ?VatAmountMismatchType $vatAmountMismatch = null,

        /**
         * @var ?bool Nincs felszámított áfa a 17. § alapján.
         */
        public ?bool $noVatCharge = null,
    ) {
        $notNullElements = array_reduce(
            $this->toArray(),
            static fn (int $count, mixed $value) => $count + (is_null($value) ? 0 : 1),
            initial: 0
        );

        if ($notNullElements != 1) {
            throw new InvalidArgumentException("A konstruktor paraméterk közül csak egyet lehet megadni.");
        }

        if (is_bool($this->vatDomesticReverseCharge) && ($this->vatDomesticReverseCharge !== true)) {
            throw new InvalidArgumentException('A "vatDomesticReverseCharge" konstruktor paraméternek fixen true-nak kell lennie.');
        }

        if (is_bool($this->noVatCharge) && ($this->noVatCharge !== true)) {
            throw new InvalidArgumentException('A "noVatCharge" konstruktor paraméternek fixen true-nak kell lennie.');
        }

        parent::__construct();
    }
}
