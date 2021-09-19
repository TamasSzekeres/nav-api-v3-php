<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Részletes címadatok.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class DetailedAddressType extends BaseType
{
    /**
     * @var Az országkód ISO 3166 alpha-2 szabvány szerint.
     */
    public $countryCode;

    /**
     * @var Tartomány kódja (amennyiben értelmezhető az adott országban) az ISO 3166-2 alpha 2 szabvány szerint.
     */
    public $region;

    /**
     * @var Irányítószám (amennyiben nem értelmezhető, 0000 értékkel kell kitölteni).
     */
    public $postalCode;

    /**
     * @var Település.
     */
    public $city;

    /**
     * @var Közterület neve.
     */
    public $streetName;

    /**
     * @var Közterület jellege.
     */
    public $publicPlaceCategory;

    /**
     * @var Házszám.
     */
    public $number;

    /**
     * @var Épület.
     */
    public $building;

    /**
     * @var Lépcsőház.
     */
    public $staircase;

    /**
     * @var Emelet.
     */
    public $floor;

    /**
     * @var Ajtó.
     */
    public $door;

    /**
     * @var Helyrajzi szám.
     */
    public $lotNumber;
}
