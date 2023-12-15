<?php

use GuzzleHttp\Psr7\Response;
use LightSideSoftware\NavApi\V3\Exceptions\BusinessFaultException;
use LightSideSoftware\NavApi\V3\Factories\MetricServiceClientFactory;
use LightSideSoftware\NavApi\V3\MetricServiceClient;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsListResponse;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsResponse;

test('query service metrics', function () {
    $queryServiceMetricsResponse = createResponseFromXml(loadTestResponse('QueryServiceMetricsResponse'));

    $metricClientFactory = MetricServiceClientFactory::create()
        ->testBaseUrl();

    $metricClient = $metricClientFactory->createClientMock([$queryServiceMetricsResponse]);

    $response = $metricClient->metric();

    $lastRequest = $metricClientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('GET')
        ->and((string)$lastRequest->getUri())
            ->toBe($metricClientFactory::ONLINESZAMLA_API_TEST_URL . MetricServiceClient::METRICS_ENDPOINT)
        ->and($response)->toBeInstanceOf(QueryServiceMetricsResponse::class);
});

it('throws Exception by calling metric', function () {
    $metricClient = MetricServiceClientFactory::create()
        ->testBaseUrl()
        ->createClientMock([new Response(status: 500)]);

    $metricClient->metric();
})->throws(Exception::class);

test('query service metrics list', function () {
    $queryServiceMetricsListResponse = createResponseFromXml(loadTestResponse('QueryServiceMetricsListResponse'));

    $metricClientFactory = MetricServiceClientFactory::create()
        ->testBaseUrl();

    $metricClient = $metricClientFactory->createClientMock([$queryServiceMetricsListResponse]);
    $response = $metricClient->list();
    $lastRequest = $metricClientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('GET')
        ->and((string)$lastRequest->getUri())
            ->toBe($metricClientFactory::ONLINESZAMLA_API_TEST_URL . MetricServiceClient::METRICS_LIST_ENDPOINT)
        ->and($response)->toBeInstanceOf(QueryServiceMetricsListResponse::class);
});

it('throws Exception by calling list', function () {
    $metricClient = MetricServiceClientFactory::create()
        ->testBaseUrl()
        ->createClientMock([new Response(status: 500)]);

    $metricClient->list();
})->throws(Exception::class);

test('query service metric by name', function () {
    $queryServiceMetricsResponse = createResponseFromXml(loadTestResponse('QueryServiceMetricsResponse'));

    $metricClientFactory = MetricServiceClientFactory::create()
        ->testBaseUrl();

    $metricClient = $metricClientFactory->createClientMock([$queryServiceMetricsResponse]);
    $response = $metricClient->metricByName('responseTimeAverageMsManageInvoice');
    $lastRequest = $metricClientFactory->getMockHandler()->getLastRequest();

    expect($lastRequest->getMethod())->toBe('GET')
        ->and((string)$lastRequest->getUri())
            ->toBe($metricClientFactory::ONLINESZAMLA_API_TEST_URL
                . MetricServiceClient::METRICS_ENDPOINT
                . '/responseTimeAverageMsManageInvoice'
            )
        ->and($response)->toBeInstanceOf(QueryServiceMetricsResponse::class);
});

it('throws BusinessFaultException by calling metric by name', function () {
    $queryServiceMetricsResponse = createResponseFromXml(loadTestResponse('BusinessFault'), status: 404);

    $metricClient = MetricServiceClientFactory::create()
        ->testBaseUrl()
        ->createClientMock([$queryServiceMetricsResponse]);

    $metricClient->metricByName('non-existing-metric');
})->throws(BusinessFaultException::class);
