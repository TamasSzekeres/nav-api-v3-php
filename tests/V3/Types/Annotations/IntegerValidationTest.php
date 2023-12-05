<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\IntegerValidation;

test('integer validation', function (
    int $value,
    IntegerValidation $integerValidation,
    bool $hasError
) {
    $property = 'integerValue';
    expect($integerValidation->validateProperty($property, $value)->hasErrors($property))->toBe($hasError);
})->with([
    [5, new IntegerValidation(minInclusive: 5), false],
    [5, new IntegerValidation(minInclusive: 6), true],
    [5, new IntegerValidation(maxInclusive: 5), false],
    [5, new IntegerValidation(maxInclusive: 4), true],
    [6, new IntegerValidation(minExclusive: 5), false],
    [6, new IntegerValidation(minExclusive: 6), true],
    [4, new IntegerValidation(maxExclusive: 5), false],
    [4, new IntegerValidation(maxExclusive: 4), true],
]);

test('integer validation with invalid parameter', function () {
    $integerValidation = new IntegerValidation();

    expect($integerValidation->validateProperty('name', 'invalid parameter')->hasErrors())->toBeTrue();
});

it('throws exception because of invalid arguments', function (
    ?int $minExclusive,
    ?int $maxExclusive,
    ?int $minInclusive,
    ?int $maxInclusive,
) {
    new IntegerValidation(
        minExclusive: $minExclusive,
        maxExclusive: $maxExclusive,
        minInclusive: $minInclusive,
        maxInclusive: $maxInclusive,
    );
})->with([
    [2, 1, null, null],
    [null, null, 4, 3],
])->throws(InvalidArgumentException::class);
