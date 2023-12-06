<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\QuantityTypeValidation;

beforeEach(function () {
    $this->validation = new QuantityTypeValidation();
});

test('quantity validation', function (float $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    [1.0, false],
    [30012345.123456, false],
    [566435230123450124.1234, false],
    [56643523012346501242462, true],
]);
