<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\AuditDataType;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\SourceType;
use LightSideSoftware\NavApi\V3\Types\InvoiceDataResultType;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceDataResponse;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

test('create query-invoice-data-response from xml', function () {
    $responseXml = loadTestResponse('QueryInvoiceDataResponse');

    $response = QueryInvoiceDataResponse::fromXml($responseXml);

    expect($response->header)->toBeInstanceOf(BasicHeaderType::class)
        ->and($response->header->requestId)->toBe('RID215118906689')
        ->and($response->header->timestamp)->toEqualDateTimeImmutable(new DateTimeImmutable('2021-09-20 19:16:05.000'))
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
        ->and($response->invoiceDataResult)->toBeInstanceOf(InvoiceDataResultType::class)
        ->and($response->invoiceDataResult->invoiceData)->toBe('ABCE')
        ->and($response->invoiceDataResult->auditData)->toBeInstanceOf(AuditDataType::class)
        ->and($response->invoiceDataResult->auditData->insdate)->toEqualDateTimeImmutable(new DateTimeImmutable('2020-01-01 02:00:00.333'))
        ->and($response->invoiceDataResult->auditData->insCusUser)->toBe('A123456')
        ->and($response->invoiceDataResult->auditData->source)->toBe(SourceType::XML)
        ->and($response->invoiceDataResult->auditData->originalRequestVersion)->toBe(OriginalRequestVersionType::VERSION_3_0)
        ->and($response->invoiceDataResult->compressedContentIndicator)->toBeFalse();
});

it('throws no exceptions', function () {
    new QueryInvoiceDataResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        invoiceDataResult: new InvoiceDataResultType(
            invoiceData: 'ABCE',
            auditData: new AuditDataType(
                insdate: new DateTimeImmutable('2020-01-01 02:00:00.333'),
                insCusUser: 'A123456',
                source: SourceType::XML,
                originalRequestVersion: OriginalRequestVersionType::VERSION_3_0,
            ),
            compressedContentIndicator: false,
        ),
    );
})->throwsNoExceptions();

it('throws InvalidValidationException', function () {
    new QueryInvoiceDataResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        invoiceDataResult: new InvoiceDataResultType(
            invoiceData: 'AB;CE',
            auditData: new AuditDataType(
                insdate: new DateTimeImmutable('2000-01-01 02:00:00.333'),
                insCusUser: 'A123456;',
                source: SourceType::XML,
                originalRequestVersion: OriginalRequestVersionType::VERSION_3_0,
            ),
            compressedContentIndicator: false,
        ),
    );
})->throws(ValidationException::class);
