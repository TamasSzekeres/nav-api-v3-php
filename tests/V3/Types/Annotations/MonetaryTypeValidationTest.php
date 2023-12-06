<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\MonetaryTypeValidation;

beforeEach(function () {
    $this->validation = new MonetaryTypeValidation();
});

test('monetary validation', function (float $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    [1.0, false],
    [30012345.12, false],
    [30123450124.1234, true],
    [113534524435457654234.12, true],
]);
