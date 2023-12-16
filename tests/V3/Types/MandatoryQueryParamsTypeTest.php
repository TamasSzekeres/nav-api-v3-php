<?php

use LightSideSoftware\NavApi\V3\Types\DateIntervalParamType;
use LightSideSoftware\NavApi\V3\Types\DateTimeIntervalParamType;
use LightSideSoftware\NavApi\V3\Types\MandatoryQueryParamsType;

const DATE_INTERVAL_PARAM_TYPE_EXAMPLE = new DateIntervalParamType(
    dateFrom: new DateTimeImmutable('2019-01-01'),
    dateTo: new DateTimeImmutable('2019-01-01'),
);

const DATE_TIME_INTERVAL_PARAM_TYPE = new DateTimeIntervalParamType(
    dateTimeFrom: new DateTimeImmutable('2022-01-01 12:00:00'),
    dateTimeTo: new DateTimeImmutable('2022-01-30 12:00:00'),
);

it('throws no exceptions', function () {
    new MandatoryQueryParamsType(
        invoiceIssueDate: DATE_INTERVAL_PARAM_TYPE_EXAMPLE,
    );

    new MandatoryQueryParamsType(
        insDate: DATE_TIME_INTERVAL_PARAM_TYPE,
    );

    new MandatoryQueryParamsType(
        originalInvoiceNumber: 'I0001',
    );
})->throwsNoExceptions();

it('throws InvalidArgumentException', function (
    ?DateIntervalParamType $invoiceIssueDate,
    ?DateTimeIntervalParamType $insDate,
    ?string $originalInvoiceNumber,
) {
    new MandatoryQueryParamsType(
        invoiceIssueDate: $invoiceIssueDate,
        insDate: $insDate,
        originalInvoiceNumber: $originalInvoiceNumber,
    );
})->with([
    [null, null, null],
    [DATE_INTERVAL_PARAM_TYPE_EXAMPLE, DATE_TIME_INTERVAL_PARAM_TYPE, null],
    [DATE_INTERVAL_PARAM_TYPE_EXAMPLE, null, 'I0001'],
    [null, DATE_TIME_INTERVAL_PARAM_TYPE, 'I0001'],
    [DATE_INTERVAL_PARAM_TYPE_EXAMPLE, DATE_TIME_INTERVAL_PARAM_TYPE, 'I0001'],
])->throws(InvalidArgumentException::class);
