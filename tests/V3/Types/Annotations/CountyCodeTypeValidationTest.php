<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\CountyCodeTypeValidation;

beforeEach(function () {
    $this->validation = new CountyCodeTypeValidation();
});

test('county code validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['01', false],
    ['0', true],
    ['012', true],
    ['A0', true],
]);
