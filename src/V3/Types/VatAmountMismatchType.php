<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use LightSideSoftware\NavApi\V3\Types\Annotations\RateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * Adóalap és felszámított adó eltérésének adatai.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class VatAmountMismatchType extends BaseType
{
    public function __construct(
        /**
         * @var float Adómérték, adótartalom.
         */
        #[RateTypeValidation]
        public float $vatRate,

        /**
         * @var string Az eset leírása kóddal.
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $case,
    ) {
        parent::__construct();
    }
}
