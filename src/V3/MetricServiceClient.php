<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use JetBrains\PhpStorm\ArrayShape;
use LightSideSoftware\NavApi\V3\Exceptions\BusinessFaultException;
use LightSideSoftware\NavApi\V3\Types\Responses\BusinessFaultResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsListResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsResponse;

/**
 * Kliens metrikák lekéréséhez.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class MetricServiceClient implements MetricServiceClientInterface
{
    public const METRICS_ENDPOINT = '/metricService/v3/queryServiceMetrics/metric';
    public const METRICS_LIST_ENDPOINT = '/metricService/v3/queryServiceMetrics/list';

    /**
     * @param Client $client HTTP-kliens.
     */
    public function __construct(private Client $client)
    {
    }

    /**
     * {@inheritDoc}
     * @throws GuzzleException
     * @throws Exception
     */
    public function metric(): QueryServiceMetricsResponse
    {
        $response = $this->getClient()->get(
            uri: self::METRICS_ENDPOINT,
            options: $this->httpOptions()
        );
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 200 && $statusCode < 300) {
            $xml = $response->getBody()->getContents();
            return QueryServiceMetricsResponse::fromXml($xml);
        } else {
            throw new Exception('Hiba API hívás során!');
        }
    }

    /**
     * {@inheritDoc}
     * @throws GuzzleException
     * @throws Exception
     */
    public function list(): QueryServiceMetricsListResponse
    {
        $response = $this->getClient()->get(
            uri: self::METRICS_LIST_ENDPOINT,
            options: $this->httpOptions()
        );
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 200 && $statusCode < 300) {
            $xml = $response->getBody()->getContents();
            return QueryServiceMetricsListResponse::fromXml($xml);
        } else {
            throw new Exception('Hiba API hívás során!');
        }
    }

    /**
     * {@inheritDoc}
     * @throws GuzzleException
     * @throws BusinessFaultException
     */
    public function metricByName(string $metricName): QueryServiceMetricsResponse
    {
        $response = $this->getClient()->get(
            uri: self::METRICS_ENDPOINT . "/{$metricName}",
            options: $this->httpOptions()
        );
        $statusCode = $response->getStatusCode();
        $xml = $response->getBody()->getContents();

        if ($statusCode >= 200 && $statusCode < 300) {
            return QueryServiceMetricsResponse::fromXml($xml);
        } else {
            $businessFaultResponse = BusinessFaultResponse::fromXml($xml);
            throw new BusinessFaultException(
                'Hiba API hívás során!',
                $businessFaultResponse,
                $statusCode
            );
        }
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    #[ArrayShape([
        'headers' => 'string[]',
        'http_errors' => 'bool',
    ])]
    private function httpOptions(): array
    {
        return [
            'headers' => [
                'Accept' => 'application/xml',
                'Content-Type' => 'application/xml',
            ],
            'http_errors' => false,
        ];
    }
}
