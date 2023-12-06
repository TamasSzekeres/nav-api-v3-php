<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\VatCodeTypeValidation;

beforeEach(function () {
    $this->validation = new VatCodeTypeValidation();
});

test('vat-code validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['1', false],
    ['6', true],
    ['', true],
]);
