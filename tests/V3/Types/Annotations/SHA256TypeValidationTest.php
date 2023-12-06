<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\SHA256TypeValidation;

beforeEach(function () {
    $this->validation = new SHA256TypeValidation();
});

test('sha-256 validation', function (string $value, bool $hasError) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasError);
})->with([
    ['ACBDEFACBDACBDEFACBDACBDEFACBDBDCA094738274637564514237465746352', false],
    ['ACBDEFACBDACBDEFACBDACBDEFACBDBDCA09473827463756451423746574635', true],
    ['ACBDEFACBDACBDEFACBDACBDEFACBDBDCA094738274637564514237465746352A', true],
    ['ACBDEFACBDA_BDEFACBDACBDEFACBDBDCA094738274637564514237465746352', true],
]);
