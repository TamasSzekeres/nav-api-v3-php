<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceUnboundedIndexTypeValidation;

beforeEach(function () {
    $this->validation = new InvoiceUnboundedIndexTypeValidation();
});

test('invoice-unbounded-index validation', function (int $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    [1, false],
    [0, true],
    [PHP_INT_MAX, false],
]);
