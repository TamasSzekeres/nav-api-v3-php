<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\TaxPayerIdTypeValidation;

beforeEach(function () {
    $this->validation = new TaxPayerIdTypeValidation();
});

test('tax-payer-id validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['19578375', false],
    ['195783754', true],
    ['1957837', true],
    ['195_8375', true],
]);
