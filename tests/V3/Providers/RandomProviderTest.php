<?php

use LightSideSoftware\NavApi\V3\Providers\RandomProvider;

beforeEach(function () {
    $this->randonProvider = new RandomProvider();
});

test('number', function (int $min, int $max) {
    $random = $this->randonProvider->number($min, $max);

    expect($random)->toBeGreaterThanOrEqual($min)->toBeLessThanOrEqual($max);
})->with([
    [0, 10],
    [10, 20],
    [100, 1000],
]);

it('throws exception because of negative length', function () {
    $this->randonProvider->string(-1);
})->throws(InvalidArgumentException::class);

it('returns empty string', function () {
    $randomString = $this->randonProvider->string(0);

    expect($randomString)->toBeEmpty();
});

test('random string', function (int $length) {
    $randomString = $this->randonProvider->string($length);
    $length = strlen($randomString);

    expect($length)->toEqual($length)
        ->and($randomString)->toMatch('/^[0-9A-Za-z]+$/');
})->with([
    [1],
    [10],
    [50],
]);
