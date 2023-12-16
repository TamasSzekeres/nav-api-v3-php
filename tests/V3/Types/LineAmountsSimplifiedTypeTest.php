<?php

use LightSideSoftware\NavApi\V3\Types\LineAmountsSimplifiedType;
use LightSideSoftware\NavApi\V3\Types\VatRateType;

it('throws no exceptions', function () {
    new LineAmountsSimplifiedType(
        lineVatRate: new VatRateType(
            vatPercentage: 0.27,
        ),
        lineGrossAmountSimplified: 10.0,
        lineGrossAmountSimplifiedHUF: 3860.0,
    );
})->throwsNoExceptions();
