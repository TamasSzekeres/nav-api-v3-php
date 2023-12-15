<?php

use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use LightSideSoftware\NavApi\V3\Factories\MetricServiceClientFactory;
use LightSideSoftware\NavApi\V3\MetricServiceClientInterface;

test('create metric-client by factory', function () {
    $factory = MetricServiceClientFactory::create()
        ->productionBaseUrl()
        ->timeout(4.0);

    $client = $factory->createClient();

    expect($factory->getBaseUrl())->toBe(MetricServiceClientFactory::ONLINESZAMLA_API_URL)
        ->and($factory->getTimeout())->toBe(4.0)
        ->and($client)->toBeInstanceOf(MetricServiceClientInterface::class);
});

it('throws InvalidConfigException', function () {
    MetricServiceClientFactory::create()
        ->createClient();
})->throws(InvalidConfigException::class);
