<?php

use LightSideSoftware\NavApi\V3\Types\VatAmountMismatchType;

it('throws no exceptions', function () {
    new VatAmountMismatchType(
        vatRate: 0.27,
        case: 'CASE 001',
    );
})->throwsNoExceptions();
