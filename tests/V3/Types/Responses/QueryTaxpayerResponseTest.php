<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\DetailedAddressType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\IncorporationType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\TaxpayerAddressTypeType;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryTaxpayerResponse;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\TaxNumberType;
use LightSideSoftware\NavApi\V3\Types\TaxpayerAddressItemType;
use LightSideSoftware\NavApi\V3\Types\TaxpayerAddressListType;
use LightSideSoftware\NavApi\V3\Types\TaxpayerDataType;

test('create query-taxpayer-response from xml', function () {
    $responseXml = loadTestResponse('QueryTaxpayerResponse');

    $response = QueryTaxpayerResponse::fromXml($responseXml);

    expect($response->header)->toBeInstanceOf(BasicHeaderType::class)
        ->and($response->header->requestId)->toBe('RID098907200170111593633035')
        ->and($response->header->timestamp)->toEqualDateTimeImmutable(new DateTimeImmutable('2023-11-27 20:12:16.989'))
        ->and($response->header->requestVersion)->toBe('3.0')
        ->and($response->header->headerVersion)->toBe('1.0')
        ->and($response->result)->toBeInstanceOf(BasicResultType::class)
        ->and($response->result->funcCode)->toBe(FunctionCodeType::OK)
        ->and($response->software)->toBeInstanceOf(SoftwareType::class)
        ->and($response->software->softwareId)->toBe('123456789123456789')
        ->and($response->software->softwareName)->toBe('Test Online Számlázó')
        ->and($response->software->softwareOperation)->toBe(SoftwareOperationType::ONLINE_SERVICE)
        ->and($response->software->softwareMainVersion)->toBe('1.0')
        ->and($response->software->softwareDevName)->toBe('Test Software Kft.')
        ->and($response->software->softwareDevContact)->toBe('test@example.com')
        ->and($response->software->softwareDevCountryCode)->toBe('HU')
        ->and($response->software->softwareDevTaxNumber)->toBe('66445533')
        ->and($response->infoDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2019-06-23 22:00:00.000'))
        ->and($response->taxpayerValidity)->toBeTrue()
        ->and($response->taxpayerData)->toBeInstanceOf(TaxpayerDataType::class)
        ->and($response->taxpayerData->taxpayerName)->toBe('ABC INFORMATIKA ZÁRTKÖRŰEN MŰKÖDŐ RÉSZVÉNYTÁRSASÁG')
        ->and($response->taxpayerData->taxNumberDetail)->toBeInstanceOf(TaxNumberType::class)
        ->and($response->taxpayerData->taxNumberDetail->vatCode)->toBe('2')
        ->and($response->taxpayerData->taxNumberDetail->countyCode)->toBe('42')
        ->and($response->taxpayerData->incorporation)->toBe(IncorporationType::ORGANIZATION)
        ->and($response->taxpayerData->taxpayerShortName)->toBe('ABC Informatika Zrt.')
        ->and($response->taxpayerData->vatGroupMembership)->toBeNull()
        ->and($response->taxpayerData->taxpayerAddressList)->toBeInstanceOf(TaxpayerAddressListType::class)
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems)->toBeArray()
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems)->toHaveCount(1)
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0])->toBeInstanceOf(TaxpayerAddressItemType::class)
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddressType)->toBe(TaxpayerAddressTypeType::HQ)
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress)->toBeInstanceOf(DetailedAddressType::class)
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->countryCode)->toBe('HU')
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->postalCode)->toBe('1141')
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->city)->toBe('BUDAPEST')
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->streetName)->toBe('NINCS')
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->publicPlaceCategory)->toBe('UTCA')
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->region)->toBeNull()
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->number)->toBe('2')
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->building)->toBeNull()
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->staircase)->toBeNull()
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->floor)->toBeNull()
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->door)->toBeNull()
        ->and($response->taxpayerData->taxpayerAddressList->taxpayerAddressItems[0]->taxpayerAddress->lotNumber)->toBeNull();
});

it('throws no exceptions', function () {
    new QueryTaxpayerResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        infoDate: new DateTimeImmutable('2019-06-23 22:00:00.000'),
        taxpayerValidity: true,
        taxpayerData: new TaxpayerDataType(
            taxpayerName: 'ABC INFORMATIKA ZÁRTKÖRŰEN MŰKÖDŐ RÉSZVÉNYTÁRSASÁG',
            taxNumberDetail: new TaxNumberType(
                taxpayerId: '12345678',
                vatCode: 2,
                countyCode: 42,
            ),
            incorporation: IncorporationType::ORGANIZATION,
            taxpayerShortName: 'ABC Informatika Zrt.',
            taxpayerAddressList: new TaxpayerAddressListType(
                taxpayerAddressItems: [
                    new TaxpayerAddressItemType(
                        taxpayerAddressType: TaxpayerAddressTypeType::HQ,
                        taxpayerAddress: new DetailedAddressType(
                            countryCode: 'HU',
                            postalCode: '1141',
                            city: 'BUDAPEST',
                            streetName: 'NINCS',
                            publicPlaceCategory: 'UTCA',
                            number: '2',
                        ),
                    ),
                ],
            ),
        ),
    );
})->throwsNoExceptions();

it('throws InvalidValidationException', function () {
    new QueryTaxpayerResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        infoDate: new DateTimeImmutable('2009-06-23 22:00:00.000'),
        taxpayerValidity: true,
        taxpayerData: new TaxpayerDataType(
            taxpayerName: 'ABC INFORMATIKA ZÁRTKÖRŰEN MŰKÖDŐ RÉSZVÉNYTÁRSASÁG',
            taxNumberDetail: new TaxNumberType(
                taxpayerId: '123456;78',
                vatCode: 2,
                countyCode: 42,
            ),
            incorporation: IncorporationType::ORGANIZATION,
            taxpayerShortName: 'ABC Informatika Zrt.',
            taxpayerAddressList: new TaxpayerAddressListType(
                taxpayerAddressItems: [
                    new TaxpayerAddressItemType(
                        taxpayerAddressType: TaxpayerAddressTypeType::HQ,
                        taxpayerAddress: new DetailedAddressType(
                            countryCode: 'HU',
                            postalCode: '1;141',
                            city: 'BUDAPEST',
                            streetName: 'NINCS',
                            publicPlaceCategory: 'UTCA',
                            number: '2',
                        ),
                    ),
                ],
            ),
        ),
    );
})->throws(ValidationException::class);
