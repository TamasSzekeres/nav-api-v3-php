<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceDateTypeValidation;

test('invoice timestamp validation', function (
    DateTimeImmutable $value,
    bool $hasError,
) {
    $invoiceTimestampTypeValidation = new InvoiceDateTypeValidation();
    $property = 'dateValue';
    expect($invoiceTimestampTypeValidation->validateProperty($property, $value)->hasErrors($property))->toBe($hasError);
})->with([
    [new DateTimeImmutable('2022-03-04'), false],
    [new DateTimeImmutable('2009-12-31'), true],
]);
