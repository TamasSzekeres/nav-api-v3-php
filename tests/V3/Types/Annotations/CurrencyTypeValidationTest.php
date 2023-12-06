<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\CurrencyTypeValidation;

beforeEach(function () {
    $this->validation = new CurrencyTypeValidation();
});

test('currency validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['ABC', false],
    ['AB', true],
    ['ABCD', true],
    ['A_C', true],
]);
