<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\EkaerIdTypeValidation;

beforeEach(function () {
    $this->validation = new EkaerIdTypeValidation();
});

test('ekaer-id validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['E485968ABCDEF45', false],
    ['E485968ABCDEF45F', true],
    ['E485968ABCDEF4', true],
]);
