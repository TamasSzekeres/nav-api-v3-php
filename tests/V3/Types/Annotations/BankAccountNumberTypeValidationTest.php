<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\BankAccountNumberTypeValidation;

beforeEach(function () {
    $this->validation = new BankAccountNumberTypeValidation();
});

test('bank account number validation', function (string $value, bool $hasErrors) {
    expect($this->validation->validateProperty('value', $value)->hasErrors())->toBe($hasErrors);
})->with([
    ['01234567-23456789-45678901', false],
    ['01234567-23456789', false],
    ['AB0101234abcdAB', false],
    ['AB010123456abcdefghijkABCDEFGHIJKL', false],
    ['01234567-23456789-456789014', true],
    ['01234567-2345_789', true],
    ['AB0101234abcdA', true],
    ['AB010123456abcdefghijkABCDEFGHIJKLM', true],
]);
