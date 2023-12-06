<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\RateTypeValidation;

beforeEach(function () {
    $this->validation = new RateTypeValidation();
});

test('rate validation', function (float $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    [0.0, false],
    [1.0, false],
    [0.1234, false],
    [0.123434, true],
    [-0.5, true],
    [1.1, true],
]);
