<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceIndexTypeValidation;

beforeEach(function () {
    $this->validation = new InvoiceIndexTypeValidation();
});

test('invoice-index validation', function (int $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    [1, false],
    [100, false],
    [0, true],
    [101, true],
]);
