<?php

use LightSideSoftware\NavApi\V3\Types\AdvancePaymentDataType;

it('throws no exceptions', function () {
    new AdvancePaymentDataType(
        advanceOriginalInvoice: 'I0001',
        advancePaymentDate: new DateTimeImmutable('2020-05-20'),
        advanceExchangeRate: 0.27,
    );
})->throwsNoExceptions();
