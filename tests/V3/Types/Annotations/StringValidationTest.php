<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

test('string validation', function (
    string $value,
    StringValidation $stringValidation,
    bool $hasError
) {
    $property = 'stringValue';
    expect($stringValidation->validateProperty($property, $value)->hasErrors($property))->toBe($hasError);
})->with([
    ['AB', new StringValidation(minLength: 1, maxLength: 3), false],
    ['AB', new StringValidation(minLength: 6, maxLength: 7), true],
    ['ABC', new StringValidation(minLength: 1, maxLength: 2), true],
    ['ABCD', new StringValidation(minLength: 1, maxLength: 4, pattern: '[A-Z]{4}'), false],
    ['AB12', new StringValidation(minLength: 1, maxLength: 4, pattern: '[A-Z]{4}'), true],
]);

test('string validation with invalid parameter', function () {
    $stringValidation = new StringValidation(minLength: 1, maxLength: 4);

    expect($stringValidation->validateProperty('name', [1, 2, 3])->hasErrors())->toBeTrue();
});

it('throws exception because of invalid arguments', function (int $minLength, int $maxLength) {
    new StringValidation(minLength: $minLength, maxLength: $maxLength);
})->with([
    [-1, 4],
    [1, -2],
    [7, 5],
])->throws(InvalidArgumentException::class);
