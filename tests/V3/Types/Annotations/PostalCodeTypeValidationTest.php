<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\PostalCodeTypeValidation;

beforeEach(function () {
    $this->validation = new PostalCodeTypeValidation();
});

test('postal code validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['A B', false],
    ['A0B', false],
    ['A-0-B', false],
    ['1125845269', false],
    ['11258452690', true],
    ['11258_5269', true],
    ['AB', true],
]);
