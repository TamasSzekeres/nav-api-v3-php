<?php

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\BusinessValidationResultType;
use LightSideSoftware\NavApi\V3\Types\Enums\BusinessResultCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceStatusType;
use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\TechnicalResultCodeType;
use LightSideSoftware\NavApi\V3\Types\ProcessingResultListType;
use LightSideSoftware\NavApi\V3\Types\ProcessingResultType;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryTransactionStatusResponse;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\TechnicalValidationResultType;

test('create query-transaction-status-response from xml', function () {
    $responseXml = loadTestResponse('QueryTransactionStatusResponse');

    $response = QueryTransactionStatusResponse::fromXml($responseXml);

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
        ->and($response->processingResults)->toBeInstanceOf(ProcessingResultListType::class)
        ->and($response->processingResults->processingResults)->toBeArray()
        ->and($response->processingResults->processingResults)->toHaveCount(1)
        ->and($response->processingResults->processingResults[0])->toBeInstanceOf(ProcessingResultType::class)
        ->and($response->processingResults->processingResults[0]->index)->toBe(1)
        ->and($response->processingResults->processingResults[0]->invoiceStatus)->toBe(InvoiceStatusType::DONE)
        ->and($response->processingResults->processingResults[0]->compressedContentIndicator)->toBeFalse()
        ->and($response->processingResults->processingResults[0]->technicalValidationMessages)->toBeArray()
        ->and($response->processingResults->processingResults[0]->technicalValidationMessages)->toHaveCount(1)
        ->and($response->processingResults->processingResults[0]->technicalValidationMessages[0])->toBeInstanceOf(TechnicalValidationResultType::class)
        ->and($response->processingResults->processingResults[0]->technicalValidationMessages[0]->validationResultCode)->toBe(TechnicalResultCodeType::CRITICAL)
        ->and($response->processingResults->processingResults[0]->businessValidationMessages)->toBeArray()
        ->and($response->processingResults->processingResults[0]->businessValidationMessages)->toHaveCount(1)
        ->and($response->processingResults->processingResults[0]->businessValidationMessages[0])->toBeInstanceOf(BusinessValidationResultType::class)
        ->and($response->processingResults->processingResults[0]->businessValidationMessages[0]->validationResultCode)->toBe(BusinessResultCodeType::INFO)
        ->and($response->processingResults->originalRequestVersion)->toBe(OriginalRequestVersionType::VERSION_3_0);
});

it('throws no exceptions', function () {
    new QueryTransactionStatusResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        processingResults: new ProcessingResultListType(
            processingResults: [
                new ProcessingResultType(
                    index: 1,
                    invoiceStatus: InvoiceStatusType::DONE,
                    compressedContentIndicator: false,
                    technicalValidationMessages: [
                        new TechnicalValidationResultType(
                            validationResultCode: TechnicalResultCodeType::CRITICAL,
                        ),
                    ],
                    businessValidationMessages: [
                        new BusinessValidationResultType(
                            validationResultCode: BusinessResultCodeType::INFO,
                        ),
                    ],
                ),
            ],
            originalRequestVersion: OriginalRequestVersionType::VERSION_3_0,
        ),
    );
})->throwsNoExceptions();
