<?php

use LightSideSoftware\NavApi\V3\Types\Annotations\InvoiceTimestampTypeValidation;

test('invoice timestamp validation', function (
    DateTimeImmutable $value,
    bool $hasError,
) {
    $invoiceTimestampTypeValidation = new InvoiceTimestampTypeValidation();
    $property = 'dateTimeValue';
    expect($invoiceTimestampTypeValidation->validateProperty($property, $value)->hasErrors($property))->toBe($hasError);
})->with([
    [new DateTimeImmutable('2022-03-04 12:00:05'), false],
    [new DateTimeImmutable('2009-12-31 23:59:59'), true],
]);
