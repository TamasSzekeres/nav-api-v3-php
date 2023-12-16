<?php

use LightSideSoftware\NavApi\V3\Types\ConventionalInvoiceInfoType;

it('throws no exceptions', function () {
    new ConventionalInvoiceInfoType(
        orderNumbers: [
            'ON001',
            'ON002',
        ],
    );
})->throwsNoExceptions();
