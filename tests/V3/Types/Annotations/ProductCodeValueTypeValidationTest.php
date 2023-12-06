<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\ProductCodeValueTypeValidation;

beforeEach(function () {
    $this->validation = new ProductCodeValueTypeValidation();
});

test('product-code-value validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['A0', false],
    ['A0FBGNTHZJUK678329746WERPO6180', false],
    ['A', true],
    ['A0FBGNTHZJUK678329746WERPO6180F', true],
    ['A0FBGNTHZJUK67832_746WERPO6180', true],
]);
