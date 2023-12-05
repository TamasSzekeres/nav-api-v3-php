<?php

use LightSideSoftware\NavApi\V3\Providers\FixedDateTimeProvider;

test('fixed datetime', function () {
    $dateTime = new DateTimeImmutable('2023-10-12 13:41');
    $dateTimeProvider = new FixedDateTimeProvider($dateTime);
    $now = $dateTimeProvider->now();

    expect($now)->toBeInstanceOf(DateTimeImmutable::class)
        ->and($now->getTimestamp())->toEqual($dateTime->getTimestamp());
});
