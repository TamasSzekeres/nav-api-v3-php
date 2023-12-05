<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\ArrayValidation;
use LightSideSoftware\NavApi\V3\Types\TaxNumberType;

it('returns no error for null array', function () {
    $arrayValidation = new ArrayValidation();

    expect($arrayValidation->validateProperty('items', null)->hasErrors())->toBeFalse();
});

it('returns error for invalid type', function () {
    $arrayValidation = new ArrayValidation();

    expect($arrayValidation->validateProperty('items', 'invalid property')->hasErrors())->toBeTrue();
});

test('array item count and type', function (
    array $array,
    ArrayValidation $arrayValidation,
    bool $hasError,
) {
    expect($arrayValidation->validateProperty('items', $array)->hasErrors())->toBe($hasError);
})->with([
    [[1, 2], new ArrayValidation(minItems: 2), false],
    [[1], new ArrayValidation(minItems: 2), true],
    [[1, 2], new ArrayValidation(maxItems: 2), false],
    [[1, 2, 3], new ArrayValidation(maxItems: 2), true],

    [[1, 2], new ArrayValidation(itemType: 'integer'), false],
    [['1', 2], new ArrayValidation(itemType: 'integer'), true],

    [
        [new TaxNumberType('12345678', '1', '02')],
        new ArrayValidation(itemType: TaxNumberType::class),
        false,
    ],
    [
        ['12345678-1-11', new TaxNumberType('12345678', '1', '02')],
        new ArrayValidation(itemType: TaxNumberType::class),
        true,
    ],
]);

it('throws exception because of invalid arguments', function (?int $minItems, ?int $maxItems) {
    new ArrayValidation(minItems: $minItems, maxItems: $maxItems);
})->with([
    [-1, null],
    [null, -1],
    [7, 5],
])->throws(InvalidArgumentException::class);
