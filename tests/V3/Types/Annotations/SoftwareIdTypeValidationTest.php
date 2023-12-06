<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\SoftwareIdTypeValidation;

beforeEach(function () {
    $this->validation = new SoftwareIdTypeValidation();
});

test('software-id validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['ABCDSDFGH-53472575', false],
    ['ABCDSDFGH-534725755', true],
    ['ABCDSDFGH-5347257', true],
    ['ABCDS_FGH-53472575', true],
]);
