<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Types;

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
    public string $countryCode;

    /**
     * @var ?string Tartomány kódja (amennyiben értelmezhető az adott országban) az ISO 3166-2 alpha 2 szabvány szerint.
     */
    public ?string $region;

    /**
     * @var string Irányítószám (amennyiben nem értelmezhető, 0000 értékkel kell kitölteni).
     */
    public string $postalCode;

    /**
     * @var string Település.
     */
    public string $city;

    /**
     * @var string Közterület neve.
     */
    public string $streetName;

    /**
     * @var string Közterület jellege.
     */
    public string $publicPlaceCategory;

    /**
     * @var ?string Házszám.
     */
    public ?string $number;

    /**
     * @var ?string Épület.
     */
    public ?string $building;

    /**
     * @var ?string Lépcsőház.
     */
    public ?string $staircase;

    /**
     * @var ?string Emelet.
     */
    public ?string $floor;

    /**
     * @var ?string Ajtó.
     */
    public ?string $door;

    /**
     * @var ?string Helyrajzi szám.
     */
    public ?string $lotNumber;
}
