<?php

use LightSideSoftware\NavApi\V3\Types\AddressType;
use LightSideSoftware\NavApi\V3\Types\PaymentEvidenceDocumentDataType;
use LightSideSoftware\NavApi\V3\Types\SimpleAddressType;
use LightSideSoftware\NavApi\V3\Types\TaxNumberType;

it('throws no exceptions', function () {
    new PaymentEvidenceDocumentDataType(
        evidenceDocumentNo: 'D0001',
        evidenceDocumentDate: new DateTimeImmutable('2020-05-14'),
        obligatedName: 'First Last',
        obligatedAddress: new AddressType(
            simpleAddress: new SimpleAddressType(
                countryCode: 'HU',
                postalCode: '1011',
                city: 'Budapest',
                additionalAddressDetail: 'Nincs utca 1',
                region: 'Pest',
            ),
        ),
        obligatedTaxNumber: new TaxNumberType(
            taxpayerId: '99999999',
            vatCode: '2',
            countyCode: '41',
        ),
    );
})->throwsNoExceptions();
