<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\InvoiceChainDigestResultType;
use LightSideSoftware\NavApi\V3\Types\InvoiceChainDigestType;
use LightSideSoftware\NavApi\V3\Types\InvoiceChainElementType;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceChainDigestResponse;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

test('create query-invoice-chain-digest-response from xml', function () {
    $responseXml = loadTestResponse('QueryInvoiceChainDigestResponse');

    $response = QueryInvoiceChainDigestResponse::fromXml($responseXml);

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
        ->and($response->invoiceChainDigestResult->currentPage)->toBe(1)
        ->and($response->invoiceChainDigestResult->availablePage)->toBe(2)
        ->and($response->invoiceChainDigestResult->invoiceChainElements)->toBeArray()
        ->and($response->invoiceChainDigestResult->invoiceChainElements)->toHaveCount(1)
        ->and($response->invoiceChainDigestResult->invoiceChainElements[0])->toBeInstanceOf(InvoiceChainElementType::class)
        ->and($response->invoiceChainDigestResult->invoiceChainElements[0]->invoiceChainDigest)->toBeInstanceOf(InvoiceChainDigestType::class)
        ->and($response->invoiceChainDigestResult->invoiceChainElements[0]->invoiceChainDigest->invoiceNumber)->toBe('SZ0001')
        ->and($response->invoiceChainDigestResult->invoiceChainElements[0]->invoiceChainDigest->invoiceOperation)->toBe(ManageInvoiceOperationType::CREATE)
        ->and($response->invoiceChainDigestResult->invoiceChainElements[0]->invoiceChainDigest->supplierTaxNumber)->toBe('12345678')
        ->and($response->invoiceChainDigestResult->invoiceChainElements[0]->invoiceChainDigest->insDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2020-01-01 12:00:00.333'))
        ->and($response->invoiceChainDigestResult->invoiceChainElements[0]->invoiceChainDigest->originalRequestVersion)->toBe(OriginalRequestVersionType::VERSION_3_0);
});

it('throws no exceptions', function () {
    new QueryInvoiceChainDigestResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        invoiceChainDigestResult: new InvoiceChainDigestResultType(
            currentPage: 1,
            availablePage: 1,
            invoiceChainElements: [
                new InvoiceChainElementType(
                    invoiceChainDigest: new InvoiceChainDigestType(
                        invoiceNumber: 'I0001',
                        invoiceOperation: ManageInvoiceOperationType::CREATE,
                        supplierTaxNumber: '12345678',
                        insDate: new DateTimeImmutable('2020-01-01'),
                        originalRequestVersion: OriginalRequestVersionType::VERSION_3_0,
                    ),
                ),
            ],
        ),
    );
})->throwsNoExceptions();

it('throws InvalidValidationException', function () {
    new QueryInvoiceChainDigestResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        invoiceChainDigestResult: new InvoiceChainDigestResultType(
            currentPage: 1,
            availablePage: 1,
            invoiceChainElements: [
                new InvoiceChainElementType(
                    invoiceChainDigest: new InvoiceChainDigestType(
                        invoiceNumber: 'I0001;',
                        invoiceOperation: ManageInvoiceOperationType::CREATE,
                        supplierTaxNumber: 'A2345678',
                        insDate: new DateTimeImmutable('2000-01-01'),
                        originalRequestVersion: OriginalRequestVersionType::VERSION_3_0,
                    ),
                ),
            ],
        )
    );
})->throws(ValidationException::class);
