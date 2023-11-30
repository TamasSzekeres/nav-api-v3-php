<?php

namespace LightSideSoftware\NavApi\V3;

use DateTimeImmutable;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use LightSideSoftware\NavApi\V3\Exceptions\GeneralErrorResponseException;
use LightSideSoftware\NavApi\V3\Providers\DateTimeProvider;
use LightSideSoftware\NavApi\V3\Providers\DateTimeProviderInterface;
use LightSideSoftware\NavApi\V3\Providers\RequestIdProviderInterface;
use LightSideSoftware\NavApi\V3\Providers\IncrementalRequestIdProvider;
use LightSideSoftware\NavApi\V3\Providers\TimeAwareRequestIdProvider;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\CryptoType;
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

/**
 * Class Client
 *
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class InvoiceServiceClient implements InvoiceServiceClientInterface
{
    public const REQUEST_VERSION = '3.0';
    public const HEADER_VERSION = '1.0';

    public const QUERY_TAXPAYER_ENDPOINT = '/invoiceService/v3/queryTaxpayer';
    public const TOKEN_EXCHANGE_ENDPOINT = '/invoiceService/v3/tokenExchange';

    public function __construct(
        private readonly Client $client,
        private readonly string $login,
        private readonly string $xmlSignKey,
        private readonly string $password,
        private readonly string $taxNumber,
        private readonly SoftwareType $software,
        private readonly RequestIdProviderInterface $requestIdProvider = new TimeAwareRequestIdProvider(),
        private readonly DateTimeProviderInterface $dateTimeProvider = new DateTimeProvider()
    ) {
    }

    public function manageAnnulment(): ManageAnnulmentResponse
    {
    }

    public function manageInvoice(): ManageInvoiceResponse
    {
    }

    public function queryInvoiceChainDigest(): QueryInvoiceChainDigestResponse
    {
    }

    public function queryInvoiceCheck(): QueryInvoiceCheckResponse
    {
    }

    public function queryInvoiceData(): QueryInvoiceDataResponse
    {
    }

    public function queryInvoiceDigest(): QueryInvoiceDigestResponse
    {
    }

    public function queryTransactionList(): QueryTransactionListResponse
    {
    }

    public function queryTransactionStatus(): QueryTransactionStatusResponse
    {
    }

    /**
     * @param string $taxNumber
     * @return QueryTaxpayerResponse
     * @throws GeneralErrorResponseException
     * @throws GuzzleException
     */
    public function queryTaxpayer(string $taxNumber): QueryTaxpayerResponse
    {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new QueryTaxpayerRequest([
            'header' => $header,
            'user' => $this->makeUserHeader($requestSignature),
            'software' => $this->getSoftware(),
            'taxNumber' => $taxNumber,
        ]);

        try {
            $response = $this->post(self::QUERY_TAXPAYER_ENDPOINT, $request, QueryTaxpayerResponse::class);

            if ($response instanceof QueryTaxpayerResponse) {
                return $response;
            } else {
                throw new \Exception();
            }
        } catch (ClientException $clientException) {
            throw GeneralErrorResponseException::fromClientException($clientException);
        }
    }

    /**
     * A számlaadat-szolgáltatás és a technikai érvénytelenítés beküldését megelőző egyszer használatos adatszolgáltatási token kiadását végző operáció.
     *
     * @throws GeneralErrorResponseException
     * @throws GuzzleException
     */
    public function tokenExchange(): TokenExchangeResponse
    {
        $header = $this->makeBasicHeader();
        $requestSignature = $this->makeRequestSignatureForQuery($header->requestId, $header->timestamp);

        $request = new TokenExchangeRequest([
            'header' => $header,
            'user' => $this->makeUserHeader($requestSignature),
            'software' => $this->getSoftware(),
        ]);

        try {
            $response = $this->post(self::TOKEN_EXCHANGE_ENDPOINT, $request, TokenExchangeResponse::class);

            if ($response instanceof TokenExchangeResponse) {
                return $response;
            } else {
                throw new \Exception();
            }
        } catch (ClientException $clientException) {
            throw GeneralErrorResponseException::fromClientException($clientException);
        }
    }

    /**
     * @param string $uri
     * @param BasicRequestType $request
     * @param class-string<BasicResponseType> $responseClass
     * @return BasicResponseType
     * @throws GuzzleException
     */
    private function post(string $uri, BasicRequestType $request, string $responseClass): BasicResponseType
    {
        $client = $this->getHttpClient();
        $requestXml = $request->toXml();

        $httpResponse = $client->post($uri, [
            'body' => $requestXml,
        ]);

        $xmlResponse = $httpResponse->getBody()->getContents();
        $response = $responseClass::fromXml($xmlResponse);

        return $response;
    }

    private function makeBasicHeader(): BasicHeaderType
    {
        return new BasicHeaderType([
            'requestId' => $this->requestIdProvider->nextRequestId(),
            'timestamp' => $this->dateTimeProvider->now(),
            'requestVersion' => static::REQUEST_VERSION,
            'headerVersion' => static::HEADER_VERSION,
        ]);
    }

    private function makeUserHeader(CryptoType $requestSignature): UserHeaderType
    {
        return new UserHeaderType([
            'login' => $this->getLogin(),
            'passwordHash' => CryptoType::sha($this->getPassword()),
            'taxNumber' => $this->getTaxNumber(),
            'requestSignature' => $requestSignature,
        ]);
    }

    private function makeRequestSignatureForQuery(string $requestId, DateTimeImmutable $timestamp): CryptoType
    {
        $data = $requestId . $timestamp->format('YmdHis') . $this->getXmlSignKey();

        return CryptoType::sha3($data);
    }

    public function getHttpClient(): Client
    {
        return $this->client;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getXmlSignKey(): string
    {
        return $this->xmlSignKey;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }

    public function getSoftware(): SoftwareType
    {
        return $this->software;
    }
}