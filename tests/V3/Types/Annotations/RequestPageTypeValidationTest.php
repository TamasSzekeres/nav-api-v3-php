<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\RequestPageTypeValidation;

beforeEach(function () {
    $this->validation = new RequestPageTypeValidation();
});

test('request page validation', function (int $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    [1, false],
    [0, true],
]);
