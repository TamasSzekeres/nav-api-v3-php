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
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class MetricServiceClient implements MetricServiceClientInterface
{
    public function __construct(private readonly Client $client)
    {
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function metric(): QueryServiceMetricsResponse
    {
        $response = $this->client->get(
            '/metricService/v3/queryServiceMetrics/metric',
            $this->httpOptions()
        );
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 200 && $statusCode < 300) {
            $xml = $response->getBody()->getContents();
            return QueryServiceMetricsResponse::fromXml($xml);
        } else {
            throw new Exception("Api call failed!");
        }
    }

    /**
     * @throws GuzzleException
     * @throws Exception
     */
    public function list(): QueryServiceMetricsListResponse
    {
        $response = $this->client->get(
            '/metricService/v3/queryServiceMetrics/list',
            $this->httpOptions()
        );
        $statusCode = $response->getStatusCode();

        if ($statusCode >= 200 && $statusCode < 300) {
            $xml = $response->getBody()->getContents();
            return QueryServiceMetricsListResponse::fromXml($xml);
        } else {
            throw new Exception("Api call failed!");
        }
    }

    /**
     * @throws GuzzleException
     * @throws BusinessFaultException
     */
    public function metricByName(string $metricName): QueryServiceMetricsResponse
    {
        $response = $this->client->get(
            "/metricService/v3/queryServiceMetrics/metric/{$metricName}",
            $this->httpOptions()
        );
        $statusCode = $response->getStatusCode();
        $xml = $response->getBody()->getContents();

        if ($statusCode >= 200 && $statusCode < 300) {
            return QueryServiceMetricsResponse::fromXml($xml);
        } else {
            $businessFaultResponse = BusinessFaultResponse::fromXml($xml);
            throw new BusinessFaultException(
                'Api call failed!',
                $businessFaultResponse,
                $statusCode
            );
        }
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    #[ArrayShape(['headers' => 'string[]', 'http_errors' => 'bool'])]
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
