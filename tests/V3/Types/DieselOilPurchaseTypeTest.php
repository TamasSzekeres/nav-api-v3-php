<?php

use LightSideSoftware\NavApi\V3\Types\DieselOilPurchaseType;
use LightSideSoftware\NavApi\V3\Types\SimpleAddressType;

it('throws no exceptions', function () {
    new DieselOilPurchaseType(
        purchaseLocation: new SimpleAddressType(
            countryCode: 'HU',
            postalCode: '5000',
            city: 'Szolnok',
            additionalAddressDetail: 'Nincs utca 1',
            region: 'JNSZ',
        ),
        purchaseDate: new DateTimeImmutable('2020-05-20'),
        vehicleRegistrationNumber: 'ABC001',
        dieselOilQuantity: 12.0,
    );
})->throwsNoExceptions();
