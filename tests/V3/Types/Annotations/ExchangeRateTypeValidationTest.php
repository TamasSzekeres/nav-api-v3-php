<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\ExchangeRateTypeValidation;

beforeEach(function () {
    $this->validation = new ExchangeRateTypeValidation();
});

test('exchange-rate validation', function (float $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    [1.0, false],
    [30012345.123456, false],
    [30123450124.1234, false],
    [0.0, true],
]);
