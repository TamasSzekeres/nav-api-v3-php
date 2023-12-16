<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\XmlElement;
use LightSideSoftware\NavApi\V3\Types\Annotations\RateTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * Adóalap és felszámított adó eltérésének adatai.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
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
        #[XmlElement(cdata: false)]
        public string $case,
    ) {
        parent::__construct();
    }
}
