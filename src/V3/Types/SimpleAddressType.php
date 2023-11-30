<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Egyszerű címtípus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final readonly class SimpleAddressType extends BaseType
{
    public function __construct(
        /**
         * @var string Az országkód az ISO 3166 alpha-2 szabvány szerint.
         */
        #[StringValidation(minLength: 2, maxLength: 2, pattern: "[A-Z]{2}")]
        public string $countryCode,

        /**
         * @var string Irányítószám (amennyiben nem értelmezhető, 0000 értékkel kell kitölteni).
         */
        #[StringValidation(minLength: 3, maxLength: 10, pattern: "[A-Z0-9][A-Z0-9\s\-]{1,8}[A-Z0-9]")]
        public string $postalCode,

        /**
         * @var string Település.
         */
        #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
        public string $city,

        /**
         * @var string További címadatok (pl. közterület neve és jellege, házszám, emelet, ajtó, helyrajzi szám, stb.).
         */
        #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
        public string $additionalAddressDetail,

        /**
         * @var ?string Tartomány kódja (amennyiben értelmezhető az adott országban) az ISO 3166-2 alpha 2 szabvány szerint.
         */
        #[SkipWhenEmpty]
        #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
        public ?string $region = null,
    ) {
        parent::__construct();
    }
}
