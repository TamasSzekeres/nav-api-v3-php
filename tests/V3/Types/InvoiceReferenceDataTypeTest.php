<?php

use LightSideSoftware\NavApi\V3\Types\InvoiceReferenceDataType;

it('throws no exceptions', function () {
    new InvoiceReferenceDataType(
        originalInvoiceNumber: 'I0001',
        modifyWithoutMaster: true,
        modificationIndex: 1,
    );
})->throwsNoExceptions();

it('throws InvalidArgumentException because of missing param', function () {
    new InvoiceReferenceDataType(
        originalInvoiceNumber: 'I0001',
        modifyWithoutMaster: true,
    );
})->throws(InvalidArgumentException::class);

it('throws InvalidArgumentException because of two exclusive params', function () {
    new InvoiceReferenceDataType(
        originalInvoiceNumber: 'I0001',
        modifyWithoutMaster: true,
        modificationTimestamp: new DateTimeImmutable('2020-05-13 14:12:00.362'),
        modificationIndex: 1,
    );
})->throws(InvalidArgumentException::class);
