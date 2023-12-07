<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\CountryCodeTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\PostalCodeTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText255NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * Egyszerű címtípus.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class SimpleAddressType extends BaseType
{
    public function __construct(
        /**
         * @var string Az országkód az ISO 3166 alpha-2 szabvány szerint.
         */
        #[CountryCodeTypeValidation]
        public string $countryCode,

        /**
         * @var string Irányítószám (amennyiben nem értelmezhető, 0000 értékkel kell kitölteni).
         */
        #[PostalCodeTypeValidation]
        public string $postalCode,

        /**
         * @var string Település.
         */
        #[SimpleText255NotBlankTypeValidation]
        public string $city,

        /**
         * @var string További címadatok (pl. közterület neve és jellege, házszám, emelet, ajtó, helyrajzi szám, stb.).
         */
        #[SimpleText255NotBlankTypeValidation]
        public string $additionalAddressDetail,

        /**
         * @var ?string Tartomány kódja (amennyiben értelmezhető az adott országban) az ISO 3166-2 alpha 2 szabvány szerint.
         */
        #[SkipWhenEmpty]
        #[SimpleText50NotBlankTypeValidation]
        public ?string $region = null,
    ) {
        parent::__construct();
    }
}
