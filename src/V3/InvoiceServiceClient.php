<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3;

use DateTimeImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use LightSideSoftware\NavApi\V3\Exceptions\GeneralErrorResponseException;
use LightSideSoftware\NavApi\V3\Exceptions\GeneralExceptionResponseException;
use LightSideSoftware\NavApi\V3\Providers\DateTimeProvider;
use LightSideSoftware\NavApi\V3\Providers\RequestIdProviderInterface;
use LightSideSoftware\NavApi\V3\Providers\TimeAwareRequestIdProvider;
use LightSideSoftware\NavApi\V3\Types\BaseType;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\CryptoType;
use LightSideSoftware\NavApi\V3\Types\DateTimeIntervalParamType;
use LightSideSoftware\NavApi\V3\Types\Enums\InvoiceDirectionType;
use LightSideSoftware\NavApi\V3\Types\Enums\RequestStatusType;
use LightSideSoftware\NavApi\V3\Types\InvoiceChainQueryType;
use LightSideSoftware\NavApi\V3\Types\InvoiceNumberQueryType;
use LightSideSoftware\NavApi\V3\Types\InvoiceOperationListType;
use LightSideSoftware\NavApi\V3\Types\InvoiceQueryParamsType;
use LightSideSoftware\NavApi\V3\Types\Requests\BasicRequestType;
use LightSideSoftware\NavApi\V3\Types\Requests\ManageAnnulmentRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\ManageInvoiceRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceChainDigestRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceCheckRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceDataRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryInvoiceDigestRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryTaxpayerRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryTransactionListRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryTransactionStatusRequest;
use LightSideSoftware\NavApi\V3\Types\Requests\TokenExchangeRequest;
use LightSideSoftware\NavApi\V3\Types\Responses\BasicResponseType;
use LightSideSoftware\NavApi\V3\Types\Responses\GeneralErrorResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\GeneralExceptionResponse;
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
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;
use Psr\Clock\ClockInterface;
use Throwable;

/**
 * Kliens számla-szolgáltatás operációhoz.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class InvoiceServiceClient implements InvoiceServiceClientInterface
{
    public const REQUEST_VERSION = '3.0';
    public const HEADER_VERSION = '1.0';

    public const MANAGE_ANNULMENT_ENDPOINT = '/invoiceService/v3/manageAnnulment';
    public const MANAGE_INVOICE_ENDPOINT = '/invoiceService/v3/manageInvoice';
    public const QUERY_INVOICE_CHAIN_DIGEST_ENDPOINT = '/invoiceService/v3/queryInvoiceChainDigest';
    public const QUERY_INVOICE_CHECK_ENDPOINT = '/invoiceService/v3/queryInvoiceCheck';
    public const QUERY_INVOICE_DATA_ENDPOINT = '/invoiceService/v3/queryInvoiceData';
    public const QUERY_INVOICE_DIGEST_ENDPOINT = '/invoiceService/v3/queryInvoiceDigest';
    public const QUERY_TRANSACTION_LIST_ENDPOINT = '/invoiceService/v3/queryTransactionList';
    public const QUERY_TRANSACTION_STATUS_ENDPOINT = '/invoiceService/v3/queryTransactionStatus';
    public const QUERY_TAXPAYER_ENDPOINT = '/invoiceService/v3/queryTaxpayer';
    public const TOKEN_EXCHANGE_ENDPOINT = '/invoiceService/v3/tokenExchange';

    public function __construct(
        public Client $client,
        public string $login,
        public string $xmlSignKey,
        public string $xmlChangeKey,
        public string $password,
        public string $taxNumber,
        public SoftwareType $software,
        public RequestIdProviderInterface $requestIdProvider = new TimeAwareRequestIdProvider(),
        public ClockInterface $dateTimeProvider = new DateTimeProvider()
    ) {
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function manageAnnulment(array $annulmentOperations): ManageAnnulmentResponse
    {
        $tokenExchangeResponse = $this->tokenExchange();
        $exchangeToken = Util::decryptAes128($tokenExchangeResponse->encodedExchangeToken, $this->xmlChangeKey);

        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new ManageAnnulmentRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
            $exchangeToken,
            $annulmentOperations,
        );

        /* @var $response ManageAnnulmentResponse */
        $response = $this->post(
            uri: self::MANAGE_ANNULMENT_ENDPOINT,
            request: $request,
            responseClass: ManageAnnulmentResponse::class,
        );

        return $response;
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function manageInvoice(InvoiceOperationListType $invoiceOperations): ManageInvoiceResponse
    {
        $tokenExchangeResponse = $this->tokenExchange();
        $exchangeToken = Util::decryptAes128($tokenExchangeResponse->encodedExchangeToken, $this->xmlChangeKey);

        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new ManageInvoiceRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
            $exchangeToken,
            $invoiceOperations,
        );

        /* @var $response ManageInvoiceResponse */
        $response = $this->post(
            uri: self::MANAGE_INVOICE_ENDPOINT,
            request: $request,
            responseClass: ManageInvoiceResponse::class,
        );

        return $response;
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function queryInvoiceChainDigest(
        InvoiceChainQueryType $invoiceChainQuery,
        int $page = 1
    ): QueryInvoiceChainDigestResponse {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new QueryInvoiceChainDigestRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
            $page,
            $invoiceChainQuery,
        );

        /* @var $response QueryInvoiceChainDigestResponse */
        $response = $this->post(
            uri: self::QUERY_INVOICE_CHAIN_DIGEST_ENDPOINT,
            request: $request,
            responseClass: QueryInvoiceChainDigestResponse::class,
        );

        return $response;
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function queryInvoiceCheck(InvoiceNumberQueryType $invoiceNumberQuery): QueryInvoiceCheckResponse
    {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new QueryInvoiceCheckRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
            $invoiceNumberQuery,
        );

        /* @var $response QueryInvoiceCheckResponse */
        $response = $this->post(
            uri: self::QUERY_INVOICE_CHECK_ENDPOINT,
            request: $request,
            responseClass: QueryInvoiceCheckResponse::class,
        );

        return $response;
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function queryInvoiceData(InvoiceNumberQueryType $invoiceNumberQuery): QueryInvoiceDataResponse
    {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new QueryInvoiceDataRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
            $invoiceNumberQuery,
        );

        /* @var $response QueryInvoiceDataResponse */
        $response = $this->post(
            uri: self::QUERY_INVOICE_DATA_ENDPOINT,
            request: $request,
            responseClass: QueryInvoiceDataResponse::class,
        );

        return $response;
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function queryInvoiceDigest(
        InvoiceDirectionType $invoiceDirection,
        InvoiceQueryParamsType $invoiceQueryParams,
        int $page = 1,
    ): QueryInvoiceDigestResponse {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new QueryInvoiceDigestRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
            $page,
            $invoiceDirection,
            $invoiceQueryParams,
        );

        /* @var $response QueryInvoiceDigestResponse */
        $response = $this->post(
            uri: self::QUERY_INVOICE_DIGEST_ENDPOINT,
            request: $request,
            responseClass: QueryInvoiceDigestResponse::class,
        );

        return $response;
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function queryTransactionList(
        DateTimeIntervalParamType $insDate,
        ?RequestStatusType $requestStatus = null,
        int $page = 1,
    ): QueryTransactionListResponse {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new QueryTransactionListRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
            $page,
            $insDate,
            $requestStatus,
        );

        /* @var $response QueryTransactionListResponse */
        $response = $this->post(
            uri: self::QUERY_TRANSACTION_LIST_ENDPOINT,
            request: $request,
            responseClass: QueryTransactionListResponse::class,
        );

        return $response;
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function queryTransactionStatus(
        string $transactionId,
        ?bool $returnOriginalRequest = null,
    ): QueryTransactionStatusResponse {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new QueryTransactionStatusRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
            $transactionId,
            $returnOriginalRequest,
        );

        /* @var $response QueryTransactionStatusResponse */
        $response = $this->post(
            uri: self::QUERY_TRANSACTION_STATUS_ENDPOINT,
            request: $request,
            responseClass: QueryTransactionStatusResponse::class,
        );

        return $response;
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function queryTaxpayer(string $taxNumber): QueryTaxpayerResponse
    {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new QueryTaxpayerRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
            $taxNumber,
        );

        /* @var $response QueryTaxpayerResponse */
        $response = $this->post(
            uri: self::QUERY_TAXPAYER_ENDPOINT,
            request: $request,
            responseClass: QueryTaxpayerResponse::class,
        );

        return $response;
    }

    /**
     * {@inheritDoc}
     * @throws ClientException
     * @throws GuzzleException
     */
    public function tokenExchange(): TokenExchangeResponse
    {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new TokenExchangeRequest(
            $header,
            $this->makeUserHeader($requestSignature),
            $this->software,
        );

        /* @var $response TokenExchangeResponse */
        $response = $this->post(
            uri: self::TOKEN_EXCHANGE_ENDPOINT,
            request: $request,
            responseClass: TokenExchangeResponse::class,
        );

        return $response;
    }

    /**
     * @param string $uri
     * @param BasicRequestType $request
     * @param class-string<BasicResponseType> $responseClass
     * @return BasicResponseType
     * @throws ClientException
     * @throws GeneralExceptionResponseException
     * @throws GeneralErrorResponseException
     * @throws GuzzleException
     */
    private function post(
        string $uri,
        BasicRequestType $request,
        string $responseClass
    ): BasicResponseType {
        $requestXml = $request->toXml();

        try {
            $httpResponse = $this->client->post($uri, [
                'body' => $requestXml,
            ]);

            $xmlResponse = $httpResponse->getBody()->getContents();

            return $responseClass::fromXml($xmlResponse);
        } catch (ClientException $clientException) {
            $xmlResponse = $clientException->getResponse()->getBody()->getContents();

            $errorResultClasses = [
                GeneralErrorResponse::class => GeneralErrorResponseException::class,
                GeneralExceptionResponse::class => GeneralExceptionResponseException::class,
            ];

            /* @var $errorException GeneralErrorResponseException|GeneralExceptionResponseException */
            $errorException = null;

            /* @var $response BaseType|null */
            /* @var $resultClass BaseType|class-string<BaseType> */
            /* @var $exceptionClass class-string<GeneralErrorResponseException|GeneralExceptionResponseException> */
            foreach ($errorResultClasses as $resultClass => $exceptionClass) {
                try {
                    $response = $resultClass::fromXml($xmlResponse);

                    if (!($response instanceof GeneralExceptionResponse && is_null($response->funcCode))) {
                        $errorException = new $exceptionClass(
                            $clientException->getMessage(),
                            $response,
                            $clientException->getCode(),
                            $clientException,
                        );
                    }
                } catch (Throwable) {
                }
            }

            if ($errorException) {
                throw $errorException;
            }

            throw $clientException;
        }
    }

    private function makeBasicHeader(): BasicHeaderType
    {
        return new BasicHeaderType(
            requestId: $this->requestIdProvider->nextRequestId(),
            timestamp: $this->dateTimeProvider->now(),
            requestVersion: self::REQUEST_VERSION,
            headerVersion: self::HEADER_VERSION,
        );
    }

    private function makeUserHeader(CryptoType $requestSignature): UserHeaderType
    {
        return new UserHeaderType(
            $this->login,
            CryptoType::sha($this->password),
            $this->taxNumber,
            $requestSignature,
        );
    }

    private function makeRequestSignatureForQuery(string $requestId, DateTimeImmutable $timestamp): CryptoType
    {
        $data = $requestId . $timestamp->format('YmdHis') . $this->xmlSignKey;

        return CryptoType::sha3($data);
    }
}
