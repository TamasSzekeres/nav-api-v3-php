<?php

use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\LanguageType;
use LightSideSoftware\NavApi\V3\Types\Enums\MetricTypeType;
use LightSideSoftware\NavApi\V3\Types\MetricDefinitionType;
use LightSideSoftware\NavApi\V3\Types\MetricDescriptionType;
use LightSideSoftware\NavApi\V3\Types\MetricType;
use LightSideSoftware\NavApi\V3\Types\MetricValueType;
use LightSideSoftware\NavApi\V3\Types\Responses\QueryServiceMetricsResponse;

test('create query-service-metrics-response from xml', function () {
    $responseXml = loadTestResponse('QueryServiceMetricsResponse');

    $response = QueryServiceMetricsResponse::fromXml($responseXml);

    expect($response->result)->toBeInstanceOf(BasicResultType::class)
        ->and($response->result->funcCode)->toBe(FunctionCodeType::OK)
        ->and($response->metricsLastUpdateTime)->toEqualDateTimeImmutable(new DateTimeImmutable('2022-05-28 09:13:30.020'))
        ->and($response->metrics)->toBeArray()
        ->and($response->metrics)->toHaveCount(2)
        ->and($response->metrics[0])->toBeInstanceOf(MetricType::class)
        ->and($response->metrics[0]->metricDefinition)->toBeInstanceOf(MetricDefinitionType::class)
        ->and($response->metrics[0]->metricDefinition->metricName)->toBe('responseTimeAverageMsManageInvoice')
        ->and($response->metrics[0]->metricDefinition->metricType)->toBe(MetricTypeType::GAUGE)
        ->and($response->metrics[0]->metricDefinition->metricDescriptions)->toBeArray()
        ->and($response->metrics[0]->metricDefinition->metricDescriptions)->toHaveCount(3)
        ->and($response->metrics[0]->metricDefinition->metricDescriptions[0])->toBeInstanceOf(MetricDescriptionType::class)
        ->and($response->metrics[0]->metricDefinition->metricDescriptions[0]->language)->toBe(LanguageType::HU)
        ->and($response->metrics[0]->metricDefinition->metricDescriptions[0]->localizedDescription)->toBe('ManageInvoice végpont átlagos válaszideje.')
        ->and($response->metrics[0]->metricDefinition->metricDescriptions[1])->toBeInstanceOf(MetricDescriptionType::class)
        ->and($response->metrics[0]->metricDefinition->metricDescriptions[1]->language)->toBe(LanguageType::EN)
        ->and($response->metrics[0]->metricDefinition->metricDescriptions[1]->localizedDescription)->toBe('Avarage response time of ManageInvoice endpoint.')
        ->and($response->metrics[0]->metricDefinition->metricDescriptions[2])->toBeInstanceOf(MetricDescriptionType::class)
        ->and($response->metrics[0]->metricDefinition->metricDescriptions[2]->language)->toBe(LanguageType::DE)
        ->and($response->metrics[0]->metricDefinition->metricDescriptions[2]->localizedDescription)->toBe('Durchschnittliche Antwortzeit des Endpunkts ManageInvoice.')
        ->and($response->metrics[0]->metricValues)->toBeArray()
        ->and($response->metrics[0]->metricValues)->toHaveCount(3)
        ->and($response->metrics[0]->metricValues[0])->toBeInstanceOf(MetricValueType::class)
        ->and($response->metrics[0]->metricValues[0]->value)->toBe(47.59)
        ->and($response->metrics[0]->metricValues[0]->timestamp)->toEqualDateTimeImmutable(new DateTimeImmutable('2022-05-28 08:14:00.023'))
        ->and($response->metrics[0]->metricValues[1])->toBeInstanceOf(MetricValueType::class)
        ->and($response->metrics[0]->metricValues[1]->value)->toBe(5.53)
        ->and($response->metrics[0]->metricValues[1]->timestamp)->toEqualDateTimeImmutable(new DateTimeImmutable('2022-05-28 08:15:00.023'))
        ->and($response->metrics[0]->metricValues[2])->toBeInstanceOf(MetricValueType::class)
        ->and($response->metrics[0]->metricValues[2]->value)->toBe(46.93)
        ->and($response->metrics[0]->metricValues[2]->timestamp)->toEqualDateTimeImmutable(new DateTimeImmutable('2022-05-28 08:29:00.023'));
});

it('throws no exceptions', function () {
    new QueryServiceMetricsResponse(
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        metricsLastUpdateTime: new DateTimeImmutable('2022-05-28 09:13:30.020'),
        metrics: [
            new MetricType(
                metricDefinition: new MetricDefinitionType(
                    metricName: 'responseTimeAverageMsManageInvoice',
                    metricType: MetricTypeType::GAUGE,
                    metricDescriptions: [
                        new MetricDescriptionType(
                            language: LanguageType::HU,
                            localizedDescription: 'ManageInvoice végpont átlagos válaszideje.',
                        ),
                        new MetricDescriptionType(
                            language: LanguageType::EN,
                            localizedDescription: 'Avarage response time of ManageInvoice endpoint.',
                        ),
                        new MetricDescriptionType(
                            language: LanguageType::DE,
                            localizedDescription: 'Durchschnittliche Antwortzeit des Endpunkts ManageInvoice.',
                        ),
                    ],
                ),
                metricValues: [
                    new MetricValueType(
                        value: 47.59,
                        timestamp: new DateTimeImmutable('2022-05-28 08:14:00.023'),
                    ),
                    new MetricValueType(
                        value: 5.53,
                        timestamp: new DateTimeImmutable('2022-05-28 08:15:00.023'),
                    ),
                    new MetricValueType(
                        value: 46.93,
                        timestamp: new DateTimeImmutable('2022-05-28 08:29:00.023'),
                    ),
                ],
            ),
        ],
    );
})->throwsNoExceptions();
