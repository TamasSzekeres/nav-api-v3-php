<?php

use LightSideSoftware\NavApi\V3\Types\PointerType;

it('throws no exceptions', function () {
    new PointerType(
        tag: 'TAG001',
        value: 'Value-01',
        line: 1,
        originalInvoiceNumber: 'I0001',
    );
})->throwsNoExceptions();
