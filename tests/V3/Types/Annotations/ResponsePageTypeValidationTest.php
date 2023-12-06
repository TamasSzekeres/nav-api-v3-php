<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\ResponsePageTypeValidation;

beforeEach(function () {
    $this->validation = new ResponsePageTypeValidation();
});

test('response page validation', function (int $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    [0, false],
    [-1, true],
]);
