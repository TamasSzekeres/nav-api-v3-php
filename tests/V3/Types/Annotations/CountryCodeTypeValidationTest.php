<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\CountryCodeTypeValidation;

beforeEach(function () {
    $this->validation = new CountryCodeTypeValidation();
});

test('country code validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['AB', false],
    ['A', true],
    ['ABC', true],
    ['A0', true],
]);
