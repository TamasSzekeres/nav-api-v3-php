<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;
use LightSideSoftware\NavApi\V3\Types\Enums\RequestStatusType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\SourceType;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryTransactionListResponse;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\TransactionListResultType;
use LightSideSoftware\NavApi\V3\Types\TransactionType;

test('create query-transaction-list-response from xml', function () {
    $responseXml = loadTestResponse('QueryTransactionListResponse');

    $response = QueryTransactionListResponse::fromXml($responseXml);

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
        ->and($response->transactionListResult)->toBeInstanceOf(TransactionListResultType::class)
        ->and($response->transactionListResult->currentPage)->toBe(1)
        ->and($response->transactionListResult->availablePage)->toBe(1)
        ->and($response->transactionListResult->transactions)->toBeArray()
        ->and($response->transactionListResult->transactions)->toHaveCount(1)
        ->and($response->transactionListResult->transactions[0])->toBeInstanceOf(TransactionType::class)
        ->and($response->transactionListResult->transactions[0]->insDate)->toEqualDateTimeImmutable(new DateTimeImmutable('2022-01-01 12:00:00.000'))
        ->and($response->transactionListResult->transactions[0]->insCusUser)->toBe('U10000')
        ->and($response->transactionListResult->transactions[0]->source)->toBe(SourceType::XML)
        ->and($response->transactionListResult->transactions[0]->transactionId)->toBe('T0001')
        ->and($response->transactionListResult->transactions[0]->requestStatus)->toBe(RequestStatusType::FINISHED)
        ->and($response->transactionListResult->transactions[0]->technicalAnnulment)->toBe(true)
        ->and($response->transactionListResult->transactions[0]->originalRequestVersion)->toBe(OriginalRequestVersionType::VERSION_3_0)
        ->and($response->transactionListResult->transactions[0]->itemCount)->toBe(1);
});

it('throws no exceptions', function () {
    new QueryTransactionListResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        transactionListResult: new TransactionListResultType(
            currentPage: 1,
            availablePage: 1,
            transactions: [
                new TransactionType(
                    insDate: new DateTimeImmutable('2022-01-01 12:00:00.000'),
                    insCusUser: 'U10000',
                    source: SourceType::XML,
                    transactionId: 'T0001',
                    requestStatus: RequestStatusType::FINISHED,
                    technicalAnnulment: true,
                    originalRequestVersion: OriginalRequestVersionType::VERSION_3_0,
                    itemCount: 1,
                ),
            ],
        ),
    );
})->throwsNoExceptions();

it('throws InvalidValidationException', function () {
    new QueryTransactionListResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
            result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
            software: SOFTWARE_TYPE_EXAMPLE,
            transactionListResult: new TransactionListResultType(
            currentPage: 1,
            availablePage: 1,
            transactions: [
                new TransactionType(
                    insDate: new DateTimeImmutable('2002-01-01 12:00:00.000'),
                    insCusUser: 'U100;00',
                    source: SourceType::XML,
                    transactionId: 'T0;001',
                    requestStatus: RequestStatusType::FINISHED,
                    technicalAnnulment: true,
                    originalRequestVersion: OriginalRequestVersionType::VERSION_3_0,
                    itemCount: 1,
                ),
            ],
        ),
    );
})->throws(ValidationException::class);
