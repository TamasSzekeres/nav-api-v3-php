<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\PlateNumberTypeValidation;

beforeEach(function () {
    $this->validation = new PlateNumberTypeValidation();
});

test('plate-number validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['AB', false],
    ['ABDL34EONHJZ381ÜIŰ0Ő18Ö46BG370', false],
    ['A', true],
    ['ABDL34EONHJZ38RŰI09Ü18Ö46BG37ŐA', true],
    ['ABDL34EONHJZ3_RŰI09Ü18Ö46BG37Ő', true],
]);
