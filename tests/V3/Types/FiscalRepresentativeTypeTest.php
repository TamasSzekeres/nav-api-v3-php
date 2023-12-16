<?php

use LightSideSoftware\NavApi\V3\Types\AddressType;
use LightSideSoftware\NavApi\V3\Types\FiscalRepresentativeType;
use LightSideSoftware\NavApi\V3\Types\SimpleAddressType;
use LightSideSoftware\NavApi\V3\Types\TaxNumberType;

it('throws no exceptions', function () {
    new FiscalRepresentativeType(
        fiscalRepresentativeTaxNumber: new TaxNumberType(
            taxpayerId: '12345678',
            vatCode: '1',
            countyCode: '55',
        ),
        fiscalRepresentativeName: 'Name 001',
        fiscalRepresentativeAddress: new AddressType(
            simpleAddress: new SimpleAddressType(
                countryCode: 'HU',
                postalCode: '5000',
                city: 'Szolnok',
                additionalAddressDetail: 'Nincs utca 1',
                region: 'JNSZ',
            ),
        ),
        fiscalRepresentativeBankAccountNumber: '12345678-12345678-12345678',
    );
})->throwsNoExceptions();
