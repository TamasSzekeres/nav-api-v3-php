<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\CountryCodeTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\PostalCodeTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText255NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;

/**
 * Részletes címadatok.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class DetailedAddressType extends BaseType
{
    public function __construct(
        /**
         * @var string Az országkód ISO 3166 alpha-2 szabvány szerint.
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
         * @var string Közterület neve.
         */
        #[SimpleText255NotBlankTypeValidation]
        public string $streetName,

        /**
         * @var string Közterület jellege.
         */
        #[SimpleText50NotBlankTypeValidation]
        public string $publicPlaceCategory,

        /**
         * @var ?string Tartomány kódja (amennyiben értelmezhető az adott országban) az ISO 3166-2 alpha 2 szabvány szerint.
         */
        #[SkipWhenEmpty]
        #[SimpleText50NotBlankTypeValidation]
        public ?string $region = null,

        /**
         * @var ?string Házszám.
         */
        #[SkipWhenEmpty]
        #[SimpleText50NotBlankTypeValidation]
        public ?string $number = null,

        /**
         * @var ?string Épület.
         */
        #[SkipWhenEmpty]
        #[SimpleText50NotBlankTypeValidation]
        public ?string $building = null,

        /**
         * @var ?string Lépcsőház.
         */
        #[SkipWhenEmpty]
        #[SimpleText50NotBlankTypeValidation]
        public ?string $staircase = null,

        /**
         * @var ?string Emelet.
         */
        #[SkipWhenEmpty]
        #[SimpleText50NotBlankTypeValidation]
        public ?string $floor = null,

        /**
         * @var ?string Ajtó.
         */
        #[SkipWhenEmpty]
        #[SimpleText50NotBlankTypeValidation]
        public ?string $door = null,

        /**
         * @var ?string Helyrajzi szám.
         */
        #[SkipWhenEmpty]
        #[SimpleText50NotBlankTypeValidation]
        public ?string $lotNumber = null,
    ) {
        parent::__construct();
    }
}
