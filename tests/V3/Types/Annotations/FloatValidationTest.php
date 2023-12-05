<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\FloatValidation;

test('float validation', function (
    float $value,
    FloatValidation $floatValidation,
    bool $hasError,
) {
    $property = 'floatValue';
    expect($floatValidation->validateProperty($property, $value)->hasErrors($property))->toBe($hasError);
})->with([
    [5.0, new FloatValidation(minInclusive: 5.0), false],
    [5.0, new FloatValidation(minInclusive: 6.0), true],
    [5.0, new FloatValidation(maxInclusive: 5.0), false],
    [5.0, new FloatValidation(maxInclusive: 4.0), true],
    [6.0, new FloatValidation(minExclusive: 5.0), false],
    [6.0, new FloatValidation(minExclusive: 6.0), true],
    [4.0, new FloatValidation(maxExclusive: 5.0), false],
    [4.0, new FloatValidation(maxExclusive: 4.0), true],
    [1.5, new FloatValidation(totalDigits: 2), false],
    [1.5, new FloatValidation(totalDigits: 1), true],
    [1.5124, new FloatValidation(fractionDigits: 4), false],
    [1.5124, new FloatValidation(fractionDigits: 3), true],
]);

test('float validation with invalid parameter', function () {
    $floatValidation = new FloatValidation();

    expect($floatValidation->validateProperty('name', 'invalid parameter')->hasErrors())->toBeTrue();
});

it('throws exception because of invalid arguments', function (
    ?float $minExclusive,
    ?float $maxExclusive,
    ?float $minInclusive,
    ?float $maxInclusive,
    ?float $totalDigits,
    ?float $fractionDigits,
) {
    new FloatValidation(
        minExclusive: $minExclusive,
        maxExclusive: $maxExclusive,
        minInclusive: $minInclusive,
        maxInclusive: $maxInclusive,
        totalDigits: $totalDigits,
        fractionDigits: $fractionDigits,
    );
})->with([
    [4.0, 3.0, null, null, null, null],
    [null, null, 2.0, 1.0, null, null],
    [null, null, null, null, -1.0, null],
    [null, null, null, null, null, -1.0],
])->throws(InvalidArgumentException::class);
