<?php

use LightSideSoftware\NavApi\V3\Types\CustomerTaxNumberType;
use LightSideSoftware\NavApi\V3\Types\CustomerVatDataType;

const CUSTOMER_TAX_NUMBER_TYPE_EXAMPLE = new CustomerTaxNumberType(
    taxpayerId: '99887764',
    vatCode: '2',
    countyCode: '02',
);

it('throws no exceptions', function () {
    new CustomerVatDataType(
        customerTaxNumber: CUSTOMER_TAX_NUMBER_TYPE_EXAMPLE,
    );

    new CustomerVatDataType(
        communityVatNumber: 'FB72',
    );

    new CustomerVatDataType(
        thirdStateTaxId: 'AB4567',
    );
})->throwsNoExceptions();

it('throws InvalidArgumentException', function (
    ?CustomerTaxNumberType $customerTaxNumber,
    ?string $communityVatNumber,
    ?string $thirdStateTaxId,
) {
    new CustomerVatDataType(
        customerTaxNumber: $customerTaxNumber,
        communityVatNumber: $communityVatNumber,
        thirdStateTaxId: $thirdStateTaxId,
    );
})->with([
    [null, null, null],
    [CUSTOMER_TAX_NUMBER_TYPE_EXAMPLE, 'AB56', null],
    [CUSTOMER_TAX_NUMBER_TYPE_EXAMPLE, null, 'VB57'],
    [null, 'AB56', 'VB57'],
    [CUSTOMER_TAX_NUMBER_TYPE_EXAMPLE, 'AB56', 'VB57'],
])->throws(InvalidArgumentException::class);
