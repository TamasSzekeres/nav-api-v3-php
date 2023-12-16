<?php

use LightSideSoftware\NavApi\V3\Types\VatRateGrossDataType;

it('throws no exceptions', function () {
    new VatRateGrossDataType(
        vatRateGrossAmount: 1,
        vatRateGrossAmountHUF: 380,
    );
})->throwsNoExceptions();
