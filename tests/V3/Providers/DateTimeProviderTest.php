<?php

use LightSideSoftware\NavApi\V3\Providers\DateTimeProvider;

beforeEach(function () {
    $this->dateTimeProvider = new DateTimeProvider();
});

test('now', function () {
    $now = $this->dateTimeProvider->now();
    $date = date('Y-m-d');

    expect($now)->toBeInstanceOf(DateTimeImmutable::class)
        ->and($now->format('Y-m-d'))->toEqual($date);
});
