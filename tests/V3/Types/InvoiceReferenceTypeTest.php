<?php

use LightSideSoftware\NavApi\V3\Types\InvoiceReferenceType;

it('throws no exceptions', function () {
    new InvoiceReferenceType(
        originalInvoiceNumber: 'I0001',
        modifyWithoutMaster: false,
        modificationIndex: 1,
    );
})->throwsNoExceptions();
