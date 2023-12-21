<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceAppearanceType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\PaymentMethodType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\SourceType;
use LightSideSoftware\NavApi\V3\Types\InvoiceDigestResultType;
use LightSideSoftware\NavApi\V3\Types\InvoiceDigestType;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceDigestResponse;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

test('create query-invoice-digest-response from xml', function () {
    $responseXml = loadTestResponse('QueryInvoiceDigestResponse');

    $response = QueryInvoiceDigestResponse::fromXml($responseXml);

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
        ->and($response->invoiceDigestResult)->toBeInstanceOf(InvoiceDigestResultType::class)
        ->and($response->invoiceDigestResult->currentPage)->toBe(1)
        ->and($response->invoiceDigestResult->availablePage)->toBe(2)
        ->and($response->invoiceDigestResult->invoiceDigests)->toBeArray()
        ->and($response->invoiceDigestResult->invoiceDigests)->toHaveCount(1)
        ->and($response->invoiceDigestResult->invoiceDigests[0])->toBeInstanceOf(InvoiceDigestType::class)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceNumber)->toBe('SZ0001')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->batchIndex)->toBe(1)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceOperation)->toBe(ManageInvoiceOperationType::CREATE)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceCategory)->toBe(InvoiceCategoryType::NORMAL)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceIssueDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2020-01-01 00:00:00'))
        ->and($response->invoiceDigestResult->invoiceDigests[0]->supplierTaxNumber)->toBe('12345678')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->supplierGroupMemberTaxNumber)->toBe('12345679')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->supplierName)->toBe('Supplier Name')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->customerTaxNumber)->toBe('23456789')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->customerGroupMemberTaxNumber)->toBe('34567890')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->customerName)->toBe('Customer Name')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->paymentMethod)->toBe(PaymentMethodType::TRANSFER)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->paymentDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2020-01-02 00:00:00'))
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceAppearance)->toBe(InvoiceAppearanceType::ELECTRONIC)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->source)->toBe(SourceType::XML)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceDeliveryDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2020-01-02 00:00:00'))
        ->and($response->invoiceDigestResult->invoiceDigests[0]->currency)->toBe('HUF')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceNetAmount)->toBe(100.0)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceNetAmountHUF)->toBe(1000.0)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceVatAmount)->toBe(20.0)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->invoiceVatAmountHUF)->toBe(200.0)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->transactionId)->toBe('T0001')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->index)->toBe(1)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->originalInvoiceNumber)->toBe('SZ0001')
        ->and($response->invoiceDigestResult->invoiceDigests[0]->modificationIndex)->toBe(2)
        ->and($response->invoiceDigestResult->invoiceDigests[0]->insDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2020-01-01 12:00:00.333'))
        ->and($response->invoiceDigestResult->invoiceDigests[0]->completenessIndicator)->toBeTrue();
});

it('throws no exceptions', function () {
    new QueryInvoiceDigestResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        invoiceDigestResult: new InvoiceDigestResultType(
            currentPage: 1,
            availablePage: 2,
            invoiceDigests: [
                new InvoiceDigestType(
                    invoiceNumber: 'SZ0001',
                    invoiceOperation: ManageInvoiceOperationType::CREATE,
                    invoiceCategory: InvoiceCategoryType::NORMAL,
                    invoiceIssueDate: new DateTimeImmutable('2020-01-01'),
                    supplierTaxNumber: '12345678',
                    supplierName: 'Supplier Name',
                    insDate: new DateTimeImmutable('2020-01-01 12:00:00.333'),
                    batchIndex: 1,
                    supplierGroupMemberTaxNumber: '12345679',
                    customerTaxNumber: '23456789',
                    customerGroupMemberTaxNumber: '34567890',
                    customerName: 'Customer Name',
                    paymentMethod: PaymentMethodType::TRANSFER,
                    paymentDate: new DateTimeImmutable('2020-01-02'),
                    invoiceAppearance: InvoiceAppearanceType::ELECTRONIC,
                    source: SourceType::XML,
                    invoiceDeliveryDate: new DateTimeImmutable('2020-01-02'),
                    currency: 'HUF',
                    invoiceNetAmount: 100.0,
                    invoiceNetAmountHUF: 1000.0,
                    invoiceVatAmount: 20.0,
                    invoiceVatAmountHUF: 200.0,
                    transactionId: 'T0001',
                    index: 1,
                    originalInvoiceNumber: 'SZ0001',
                    modificationIndex: 2,
                    completenessIndicator: true,
                ),
            ],
        ),
    );
})->throwsNoExceptions();

it('throws InvalidValidationException', function () {
    new QueryInvoiceDigestResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        invoiceDigestResult: new InvoiceDigestResultType(
            currentPage: 1,
            availablePage: 2,
            invoiceDigests: [
                new InvoiceDigestType(
                    invoiceNumber: 'SZ;0001',
                    invoiceOperation: ManageInvoiceOperationType::CREATE,
                    invoiceCategory: InvoiceCategoryType::NORMAL,
                    invoiceIssueDate: new DateTimeImmutable('2000-01-01'),
                    supplierTaxNumber: '123;45678',
                    supplierName: 'Supplier Name',
                    insDate: new DateTimeImmutable('2000-01-01 12:00:00.333'),
                    batchIndex: 1,
                    supplierGroupMemberTaxNumber: '123;45679',
                    customerTaxNumber: '23456;789',
                    customerGroupMemberTaxNumber: '3456;890',
                    customerName: 'Customer Name',
                    paymentMethod: PaymentMethodType::TRANSFER,
                    paymentDate: new DateTimeImmutable('2020-01-02'),
                    invoiceAppearance: InvoiceAppearanceType::ELECTRONIC,
                    source: SourceType::XML,
                    invoiceDeliveryDate: new DateTimeImmutable('2020-01-02'),
                    currency: 'HUF',
                    invoiceNetAmount: 100.0,
                    invoiceNetAmountHUF: 1000.0,
                    invoiceVatAmount: 20.0,
                    invoiceVatAmountHUF: 200.0,
                    transactionId: 'T0001',
                    index: 1,
                    originalInvoiceNumber: 'SZ0001',
                    modificationIndex: 2,
                    completenessIndicator: true,
                ),
            ],
        ),
    );
})->throws(ValidationException::class);
