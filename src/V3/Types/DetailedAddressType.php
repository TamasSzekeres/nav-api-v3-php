<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

use JMS\Serializer\Annotation\SkipWhenEmpty;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

/**
 * Részletes címadatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class DetailedAddressType extends BaseType
{
    /**
     * @var string Az országkód ISO 3166 alpha-2 szabvány szerint.
     */
    #[StringValidation(minLength: 2, maxLength: 2, pattern: "[A-Z]{2}")]
    public string $countryCode;

    /**
     * @var ?string Tartomány kódja (amennyiben értelmezhető az adott országban) az ISO 3166-2 alpha 2 szabvány szerint.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $region = null;

    /**
     * @var string Irányítószám (amennyiben nem értelmezhető, 0000 értékkel kell kitölteni).
     */
    #[StringValidation(minLength: 3, maxLength: 10, pattern: "[A-Z0-9][A-Z0-9\s\-]{1,8}[A-Z0-9]")]
    public string $postalCode;

    /**
     * @var string Település.
     */
    #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
    public string $city;

    /**
     * @var string Közterület neve.
     */
    #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
    public string $streetName;

    /**
     * @var string Közterület jellege.
     */
    #[StringValidation(minLength: 1, maxLength: 255, pattern: ".*[^\s].*")]
    public string $publicPlaceCategory;

    /**
     * @var ?string Házszám.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $number = null;

    /**
     * @var ?string Épület.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $building = null;

    /**
     * @var ?string Lépcsőház.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $staircase = null;

    /**
     * @var ?string Emelet.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $floor = null;

    /**
     * @var ?string Ajtó.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $door = null;

    /**
     * @var ?string Helyrajzi szám.
     */
    #[SkipWhenEmpty]
    #[StringValidation(minLength: 1, maxLength: 50, pattern: ".*[^\s].*")]
    public ?string $lotNumber = null;
}
