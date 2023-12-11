<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\Enums\LanguageType;
use LightSideSoftware\NavApi\V3\Types\Enums\MetricTypeType;
use LightSideSoftware\NavApi\V3\Types\MetricDefinitionType;
use LightSideSoftware\NavApi\V3\Types\MetricDescriptionType;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsListResponse;

test('create query-service-metrics-list-response from xml', function () {
    $responseXml = loadTestResponse('QueryServiceMetricsListResponse');

    $response = QueryServiceMetricsListResponse::fromXml($responseXml);

    expect($response->metricDefinitions)->toBeArray()
        ->and($response->metricDefinitions)->toHaveCount(1)
        ->and($response->metricDefinitions[0])->toBeInstanceOf(MetricDefinitionType::class)
        ->and($response->metricDefinitions[0]->metricName)->toBe('Metric001')
        ->and($response->metricDefinitions[0]->metricType)->toBe(MetricTypeType::COUNTER)
        ->and($response->metricDefinitions[0]->metricDescriptions)->toBeArray()
        ->and($response->metricDefinitions[0]->metricDescriptions)->toHaveCount(3)
        ->and($response->metricDefinitions[0]->metricDescriptions[0]->language)->toBe(LanguageType::HU)
        ->and($response->metricDefinitions[0]->metricDescriptions[0]->localizedDescription)->toBe('Metric001 - Description 1')
        ->and($response->metricDefinitions[0]->metricDescriptions[1]->language)->toBe(LanguageType::EN)
        ->and($response->metricDefinitions[0]->metricDescriptions[1]->localizedDescription)->toBe('Metric001 - Description 2')
        ->and($response->metricDefinitions[0]->metricDescriptions[2]->language)->toBe(LanguageType::DE)
        ->and($response->metricDefinitions[0]->metricDescriptions[2]->localizedDescription)->toBe('Metric001 - Description 3');
});

it('throws no exceptions', function () {
    new QueryServiceMetricsListResponse(
        metricDefinitions: [
            new MetricDefinitionType(
                metricName: 'Metric001',
                metricType: MetricTypeType::COUNTER,
                metricDescriptions: [
                    new MetricDescriptionType(
                        language: LanguageType::HU,
                        localizedDescription: 'Metric001 - Description 1',
                    ),
                    new MetricDescriptionType(
                        language: LanguageType::EN,
                        localizedDescription: 'Metric001 - Description 2',
                    ),
                    new MetricDescriptionType(
                        language: LanguageType::DE,
                        localizedDescription: 'Metric001 - Description 3',
                    ),
                ],
            ),
        ],
    );
})->throwsNoExceptions();

it('throws InvalidValidationException', function () {
    new QueryServiceMetricsListResponse(
        metricDefinitions: [
            new MetricDefinitionType(
                metricName: 'Metric001 - 385672ö3495684ö2389645ö968237569283' .
                    '47569857t892576238tz9ptghwt9pghbjhsdfpoivtz354n98675zu9' .
                    '8264v57689723v5öü68v2389ü6v735897v2358967v2358967235867' .
                    'üv83576ü285t54zzhrthrtzh4zu23zubtztt3tz45zrtzrtbdfsdfgs',
                metricType: MetricTypeType::COUNTER,
                metricDescriptions: [
                    new MetricDescriptionType(
                        language: LanguageType::HU,
                        localizedDescription: 'Metric001 - Description 1',
                    ),
                    new MetricDescriptionType(
                        language: LanguageType::EN,
                        localizedDescription: 'Metric001 - Description 2',
                    ),
                    new MetricDescriptionType(
                        language: LanguageType::DE,
                        localizedDescription: 'Metric001 - Description 3',
                    ),
                ],
            ),
        ],
    );
})->throws(ValidationException::class);
