<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\EntityIdTypeValidation;

beforeEach(function () {
    $this->validation = new EntityIdTypeValidation();
});

test('entity-id validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['a', false],
    ['abcde_ghIJklopqrstuv+xyz012345', false],
    ['', true],
    ['abcdefghijklopqrstuvwxyz0123456', true],
]);
