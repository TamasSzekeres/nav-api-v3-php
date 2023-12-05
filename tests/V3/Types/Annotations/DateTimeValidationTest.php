<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\DateTimeValidation;

test('datetime validation', function (
    DateTimeImmutable $value,
    DateTimeValidation $dateTimeValidation,
    bool $hasError
) {
    $property = 'dateTimeValue';
    expect($dateTimeValidation->validateProperty($property, $value)->hasErrors($property))->toBe($hasError);
})->with([
    [
        new DateTimeImmutable('2022-03-04 12:00:05'),
        new DateTimeValidation(minInclusive: new DateTimeImmutable('2022-03-04 12:00:05')),
        false,
    ],
    [
        new DateTimeImmutable('2022-03-04 12:00:05'),
        new DateTimeValidation(minInclusive: new DateTimeImmutable('2022-03-04 12:00:06')),
        true,
    ],
    [
        new DateTimeImmutable('2022-03-04 12:00:05'),
        new DateTimeValidation(maxInclusive: new DateTimeImmutable('2022-03-04 12:00:05')),
        false,
    ],
    [
        new DateTimeImmutable('2022-03-04 12:00:05'),
        new DateTimeValidation(maxInclusive: new DateTimeImmutable('2022-03-04 12:00:04')),
        true,
    ],

    [
        new DateTimeImmutable('2022-03-04 12:00:06'),
        new DateTimeValidation(minExclusive: new DateTimeImmutable('2022-03-04 12:00:05')),
        false,
    ],
    [
        new DateTimeImmutable('2022-03-04 12:00:06'),
        new DateTimeValidation(minExclusive: new DateTimeImmutable('2022-03-04 12:00:06')),
        true,
    ],
    [
        new DateTimeImmutable('2022-03-04 12:00:04'),
        new DateTimeValidation(maxExclusive: new DateTimeImmutable('2022-03-04 12:00:05')),
        false,
    ],
    [
        new DateTimeImmutable('2022-03-04 12:00:04'),
        new DateTimeValidation(maxExclusive: new DateTimeImmutable('2022-03-04 12:00:04')),
        true,
    ],
]);

test('datetime validation with invalid parameter', function () {
    $dateTimeValidation = new DateTimeValidation();

    expect($dateTimeValidation->validateProperty('name', 'invalid parameter')->hasErrors())->toBeTrue();
});
