<?php

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use LightSideSoftware\NavApi\V3\Exceptions\GeneralErrorResponseException;
use LightSideSoftware\NavApi\V3\Exceptions\GeneralExceptionResponseException;
use LightSideSoftware\NavApi\V3\Factories\InvoiceServiceClientFactory;
use LightSideSoftware\NavApi\V3\InvoiceServiceClient;
use LightSideSoftware\NavApi\V3\Types\AnnulmentOperationType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\DateTimeIntervalParamType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageAnnulmentOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\ManageInvoiceOperationType;
use LightSideSoftware\NavApi\V3\Types\InvoiceChainQueryType;
use LightSideSoftware\NavApi\V3\Types\InvoiceNumberQueryType;
use LightSideSoftware\NavApi\V3\Types\InvoiceOperationListType;
use LightSideSoftware\NavApi\V3\Types\InvoiceOperationType;
use LightSideSoftware\NavApi\V3\Types\InvoiceQueryParamsType;
use LightSideSoftware\NavApi\V3\Types\MandatoryQueryParamsType;
use LightSideSoftware\NavApi\V3\Types\Responses\ManageAnnulmentResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\ManageInvoiceResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceChainDigestResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceCheckResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceDataResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryInvoiceDigestResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryTaxpayerResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryTransactionListResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryTransactionStatusResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\TokenExchangeResponse;
use LightSideSoftware\NavApi\V3\Util;

beforeEach(function () {
    $password = 'abcdef123456';
    $xmlSignKey = 'b4-133b-76d407367df44KM7891IKOL';
    $this->xmlChangeKey = '12dd6DV674G451ZQ';

    $this->clientFactory = InvoiceServiceClientFactory::create()
        ->testBaseUrl()
        ->login(USER_HEADER_TYPE_EXAMPLE->login)
        ->password($password)
        ->taxNumber(USER_HEADER_TYPE_EXAMPLE->taxNumber)
        ->xmlSignKey($xmlSignKey)
        ->xmlChangeKey($this->xmlChangeKey)
        ->softwareId(SOFTWARE_TYPE_EXAMPLE->softwareId)
        ->softwareName(SOFTWARE_TYPE_EXAMPLE->softwareName)
        ->softwareOperation(SOFTWARE_TYPE_EXAMPLE->softwareOperation)
        ->softwareMainVersion(SOFTWARE_TYPE_EXAMPLE->softwareMainVersion)
        ->softwareDevName(SOFTWARE_TYPE_EXAMPLE->softwareDevName)
        ->softwareDevContact(SOFTWARE_TYPE_EXAMPLE->softwareDevContact)
        ->softwareDevCountryCode(SOFTWARE_TYPE_EXAMPLE->softwareDevCountryCode)
        ->softwareDevTaxNumber(SOFTWARE_TYPE_EXAMPLE->softwareDevTaxNumber);

    $this->tokenExchangeResponse = new TokenExchangeResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::ERROR,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        encodedExchangeToken: Util::encryptAes128('test-data', $this->xmlChangeKey),
        tokenValidityFrom: new DateTimeImmutable('2022-01-01 12:00:00'),
        tokenValidityTo: new DateTimeImmutable('2022-01-01 13:00:00'),
    );
});

test('calling manageAnnulment operation', closure: function () {
    $response = createResponseFromXml(loadTestResponse('ManageAnnulmentResponse'));

    $client = $this->clientFactory->createClientMock([
        createResponseFromXml($this->tokenExchangeResponse->toXml()),
        $response,
    ]);

    $response = $client->manageAnnulment([
        new AnnulmentOperationType(
            index: 1,
            annulmentOperation: ManageAnnulmentOperationType::ANNUL,
            invoiceAnnulment: base64_encode('test'),
        ),
    ]);

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::MANAGE_ANNULMENT_ENDPOINT)
        ->and($response)->toBeInstanceOf(ManageAnnulmentResponse::class);
});

test('calling manageInvoice operation', function () {
    $response = createResponseFromXml(loadTestResponse('ManageInvoiceResponse'));

    $client = $this->clientFactory->createClientMock([
        createResponseFromXml($this->tokenExchangeResponse->toXml()),
        $response,
    ]);

    $response = $client->manageInvoice(
        new InvoiceOperationListType(
            compressedContent: false,
            invoiceOperations: [
                new InvoiceOperationType(
                    index: 1,
                    invoiceOperation: ManageInvoiceOperationType::CREATE,
                    invoiceData: base64_encode('<InvoiceData></InvoiceData>'),
                ),
            ],
        ),
    );

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::MANAGE_INVOICE_ENDPOINT)
        ->and($response)->toBeInstanceOf(ManageInvoiceResponse::class);
});

test('calling queryInvoiceChainDigest operation', function () {
    $response = createResponseFromXml(loadTestResponse('QueryInvoiceChainDigestResponse'));

    $client = $this->clientFactory->createClientMock([$response]);

    $response = $client->queryInvoiceChainDigest(
        new InvoiceChainQueryType(
            invoiceNumber: 'I0001',
            invoiceDirection: InvoiceDirectionType::INBOUND,
        ),
    );

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::QUERY_INVOICE_CHAIN_DIGEST_ENDPOINT)
        ->and($response)->toBeInstanceOf(QueryInvoiceChainDigestResponse::class);
});

test('calling queryInvoiceCheck operation', function () {
    $response = createResponseFromXml(loadTestResponse('QueryInvoiceCheckResponse'));

    $client = $this->clientFactory->createClientMock([$response]);

    $response = $client->queryInvoiceCheck(
        new InvoiceNumberQueryType(
            invoiceNumber: 'I0001',
            invoiceDirection: InvoiceDirectionType::INBOUND,
        ),
    );

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::QUERY_INVOICE_CHECK_ENDPOINT)
        ->and($response)->toBeInstanceOf(QueryInvoiceCheckResponse::class);
});

test('calling queryInvoiceData operation', function () {
    $response = createResponseFromXml(loadTestResponse('QueryInvoiceDataResponse'));

    $client = $this->clientFactory->createClientMock([$response]);

    $response = $client->queryInvoiceData(
        new InvoiceNumberQueryType(
            invoiceNumber: 'I0001',
            invoiceDirection: InvoiceDirectionType::INBOUND,
        ),
    );

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::QUERY_INVOICE_DATA_ENDPOINT)
        ->and($response)->toBeInstanceOf(QueryInvoiceDataResponse::class);
});

test('calling queryInvoiceDigest operation', function () {
    $response = createResponseFromXml(loadTestResponse('QueryInvoiceDigestResponse'));

    $client = $this->clientFactory->createClientMock([$response]);

    $response = $client->queryInvoiceDigest(
        invoiceDirection: InvoiceDirectionType::INBOUND,
        invoiceQueryParams: new InvoiceQueryParamsType(
            mandatoryQueryParams: new MandatoryQueryParamsType(
                originalInvoiceNumber: 'I0001',
            ),
        ),
    );

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::QUERY_INVOICE_DIGEST_ENDPOINT)
        ->and($response)->toBeInstanceOf(QueryInvoiceDigestResponse::class);
});

test('calling queryTransactionList operation', function () {
    $response = createResponseFromXml(loadTestResponse('QueryTransactionListResponse'));

    $client = $this->clientFactory->createClientMock([$response]);

    $response = $client->queryTransactionList(
        insDate: new DateTimeIntervalParamType(
            dateTimeFrom: new DateTimeImmutable('2022-01-01 12:00:00'),
            dateTimeTo: new DateTimeImmutable('2022-01-30 12:00:00'),
        ),
    );

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::QUERY_TRANSACTION_LIST_ENDPOINT)
        ->and($response)->toBeInstanceOf(QueryTransactionListResponse::class);
});

test('calling queryTransactionStatus operation', function () {
    $response = createResponseFromXml(loadTestResponse('QueryTransactionStatusResponse'));

    $client = $this->clientFactory->createClientMock([$response]);

    $response = $client->queryTransactionStatus(
        transactionId: 'T0001',
    );

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::QUERY_TRANSACTION_STATUS_ENDPOINT)
        ->and($response)->toBeInstanceOf(QueryTransactionStatusResponse::class);
});

test('calling queryTaxpayer operation', function () {
    $response = createResponseFromXml(loadTestResponse('QueryTaxpayerResponse'));

    $client = $this->clientFactory->createClientMock([$response]);

    $response = $client->queryTaxpayer(
        taxNumber: $this->clientFactory->getTaxNumber(),
    );

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::QUERY_TAXPAYER_ENDPOINT)
        ->and($response)->toBeInstanceOf(QueryTaxpayerResponse::class);
});

test('calling tokenExchange operation', function () {
    $response = createResponseFromXml(loadTestResponse('TokenExchangeResponse'));

    $client = $this->clientFactory->createClientMock([$response]);

    $response = $client->tokenExchange();

    $lastRequest = $this->clientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('POST')
        ->and((string)$lastRequest->getUri())
        ->toBe($this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::TOKEN_EXCHANGE_ENDPOINT)
        ->and($response)->toBeInstanceOf(TokenExchangeResponse::class);
});

it('throws GeneralErrorResponseException', function () {
    $response = createResponseFromXml(loadTestResponse('GeneralErrorResponse'), status: 400);

    $client = $this->clientFactory->createClientMock([
        new ClientException(
            message: 'Error!',
            request: new Request(
                method: 'POST',
                uri: $this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::TOKEN_EXCHANGE_ENDPOINT,
            ),
            response: $response,
        ),
    ]);

    $client->tokenExchange();
})->throws(GeneralErrorResponseException::class);

it('throws GeneralExceptionResponseException', function () {
    $response = createResponseFromXml(loadTestResponse('GeneralExceptionResponse'), status: 400);

    $client = $this->clientFactory->createClientMock([
        new ClientException(
            message: 'Error!',
            request: new Request(
                method: 'POST',
                uri: $this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::TOKEN_EXCHANGE_ENDPOINT,
            ),
            response: $response,
        ),
    ]);

    $client->tokenExchange();
})->throws(GeneralExceptionResponseException::class);

it('throws clientException', function () {
    $client = $this->clientFactory->createClientMock([
        new ClientException(
            message: 'Error!',
            request: new Request(
                method: 'POST',
                uri: $this->clientFactory::ONLINESZAMLA_API_TEST_URL . InvoiceServiceClient::TOKEN_EXCHANGE_ENDPOINT,
            ),
            response: new Response(status: 500),
        ),
    ]);

    $client->tokenExchange();
})->throws(ClientException::class);
