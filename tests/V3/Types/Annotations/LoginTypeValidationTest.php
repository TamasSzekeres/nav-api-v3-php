<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\LoginTypeValidation;

beforeEach(function () {
    $this->validation = new LoginTypeValidation();
});

test('login validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['ABcd01', false],
    ['abcdjAJUIT59847', false],
    ['ABc01', true],
    ['abcdjAJUIT598470', true],
    ['abcdjAJUI_59847', true],
]);
