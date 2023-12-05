<?php

use LightSideSoftware\NavApi\V3\Providers\FixedDateTimeProvider;
use LightSideSoftware\NavApi\V3\Providers\FixedRandomProvider;
use LightSideSoftware\NavApi\V3\Providers\TimeAwareRequestIdProvider;

beforeEach(function () {
    $dateTimeProvider = new FixedDateTimeProvider(new DateTimeImmutable('2023-06-07 11:05:43'));
    $randomProvider = new FixedRandomProvider(iterator_to_array(range(0, 61)));

    $this->requestIdProvider = new TimeAwareRequestIdProvider($dateTimeProvider, $randomProvider);
});

test('', function () {
    $requestId = $this->requestIdProvider->nextRequestId();
    $expectedRequestId = 'RID202306071105430123456789abc';

    expect($requestId)->toBe($expectedRequestId);
});
