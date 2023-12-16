<?php

use LightSideSoftware\NavApi\V3\Types\AggregateInvoiceLineDataType;

it('throws no exceptions', function () {
    new AggregateInvoiceLineDataType(
        lineDeliveryDate: new DateTimeImmutable('2020-05-20'),
        lineExchangeRate: 0.27,
    );
})->throwsNoExceptions();
