<?php

use LightSideSoftware\NavApi\V3\Types\SummarySimplifiedType;
use LightSideSoftware\NavApi\V3\Types\VatRateType;

it('throws no exceptions', function () {
    new SummarySimplifiedType(
        vatRate: new VatRateType(
            vatDomesticReverseCharge: true,
        ),
        vatContentGrossAmount: 1000,
        vatContentGrossAmountHUF: 386000,
    );
})->throwsNoExceptions();
