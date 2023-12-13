<?php

use LightSideSoftware\NavApi\V3\Types\AddressType;
use LightSideSoftware\NavApi\V3\Types\DetailedAddressType;
use LightSideSoftware\NavApi\V3\Types\SimpleAddressType;

test('convert simple address to xml', function () {
    $address = new AddressType(
        simpleAddress: new SimpleAddressType(
            countryCode: 'HU',
            postalCode: '1011',
            city: 'Budapest',
            additionalAddressDetail: 'Nincs utca 1',
            region: 'Pest',
        ),
    );

    $addressXml = $address->toXml();

    $expectedXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<AddressType xmlns="http://schemas.nav.gov.hu/OSA/3.0/base"><simpleAddress><countryCode>HU</countryCode><region>Pest</region><postalCode>1011</postalCode><city>Budapest</city><additionalAddressDetail>Nincs utca 1</additionalAddressDetail></simpleAddress></AddressType>

XML;

    expect($expectedXml)->toBe($addressXml);
});

test('create simple address from xml', function () {
    $addressXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<AddressType xmlns="http://schemas.nav.gov.hu/OSA/3.0/base"><simpleAddress><countryCode>HU</countryCode><postalCode>1011</postalCode><city>Budapest</city><additionalAddressDetail>Nincs utca 1</additionalAddressDetail><region>Pest</region></simpleAddress></AddressType>

XML;

    $address = AddressType::fromXml($addressXml);

    expect($address)->toBeInstanceOf(AddressType::class)
        ->and($address->simpleAddress)->toBeInstanceOf(SimpleAddressType::class)
        ->and($address->simpleAddress->countryCode)->toBe('HU')
        ->and($address->simpleAddress->postalCode)->toBe('1011')
        ->and($address->simpleAddress->city)->toBe('Budapest')
        ->and($address->simpleAddress->additionalAddressDetail)->toBe('Nincs utca 1')
        ->and($address->simpleAddress->region)->toBe('Pest')
        ->and($address->detailedAddress)->toBeNull();
});

test('convert detailed address to xml', function () {
    $address = new AddressType(
        detailedAddress: new DetailedAddressType(
            countryCode: 'HU',
            postalCode: '1011',
            city: 'Budapest',
            streetName: 'Nincs',
            publicPlaceCategory: 'utca',
            number: '1',
        ),
    );

    $addressXml = $address->toXml();

    $expectedXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<AddressType xmlns="http://schemas.nav.gov.hu/OSA/3.0/base"><detailedAddress><countryCode>HU</countryCode><postalCode>1011</postalCode><city>Budapest</city><streetName>Nincs</streetName><publicPlaceCategory>utca</publicPlaceCategory><number>1</number></detailedAddress></AddressType>

XML;

    expect($expectedXml)->toBe($addressXml);
});

test('create detailed address from xml', function () {
    $addressXml = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<AddressType xmlns="http://schemas.nav.gov.hu/OSA/3.0/base"><detailedAddress><countryCode>HU</countryCode><postalCode>1011</postalCode><city>Budapest</city><streetName>Nincs</streetName><publicPlaceCategory>utca</publicPlaceCategory><number>1</number><region>Pest</region></detailedAddress></AddressType>

XML;

    $address = AddressType::fromXml($addressXml);

    expect($address)->toBeInstanceOf(AddressType::class)
        ->and($address->simpleAddress)->toBeNull()
        ->and($address->detailedAddress)->toBeInstanceOf(DetailedAddressType::class)
        ->and($address->detailedAddress->countryCode)->toBe('HU')
        ->and($address->detailedAddress->postalCode)->toBe('1011')
        ->and($address->detailedAddress->city)->toBe('Budapest')
        ->and($address->detailedAddress->streetName)->toBe('Nincs')
        ->and($address->detailedAddress->publicPlaceCategory)->toBe('utca')
        ->and($address->detailedAddress->number)->toBe('1')
        ->and($address->detailedAddress->region)->toBe('Pest');
});

it('throws exception for null parameters', function () {
    new AddressType(
        simpleAddress: null,
        detailedAddress: null,
    );
})->throws(InvalidArgumentException::class);

it('throws exception for multiple parameters', function () {
    new AddressType(
        simpleAddress: new SimpleAddressType(
            countryCode: 'HU',
            postalCode: '1011',
            city: 'Budapest',
            additionalAddressDetail: 'Nincs utca 1',
        ),
        detailedAddress: new DetailedAddressType(
            countryCode: 'HU',
            postalCode: '1011',
            city: 'Budapest',
            streetName: 'Nincs',
            publicPlaceCategory: 'utca',
            number: '1',
        ),
    );
})->throws(InvalidArgumentException::class);
