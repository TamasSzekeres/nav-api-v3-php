<?php

namespace LightSideSoftware\NavApi\V3\Types;

/**
 * Egyszerű címtípus.
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class SimpleAddressType extends BaseType
{
    /**
     * @var string Az országkód az ISO 3166 alpha-2 szabvány szerint.
     */
    public $countryCode;

    /**
     * @var string Tartomány kódja (amennyiben értelmezhető az adott országban) az ISO 3166-2 alpha 2 szabvány szerint.
     */
    public $region;

    /**
     * @var string Irányítószám (amennyiben nem értelmezhető, 0000 értékkel kell kitölteni).
     */
    public $postalCode;

    /**
     * @var string Település.
     */
    public $city;

    /**
     * @var string További címadatok (pl. közterület neve és jellege, házszám, emelet, ajtó, helyrajzi szám, stb.).
     */
    public $additionalAddressDetail;
}
