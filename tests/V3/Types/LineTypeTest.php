<?php

use LightSideSoftware\NavApi\V3\Types\LineAmountsNormalType;
use LightSideSoftware\NavApi\V3\Types\LineAmountsSimplifiedType;
use LightSideSoftware\NavApi\V3\Types\LineGrossAmountDataType;
use LightSideSoftware\NavApi\V3\Types\LineNetAmountDataType;
use LightSideSoftware\NavApi\V3\Types\LineType;
use LightSideSoftware\NavApi\V3\Types\LineVatDataType;
use LightSideSoftware\NavApi\V3\Types\VatRateType;

const LINE_AMOUNTS_NORMAL_TYPE_EXAMPLE = new LineAmountsNormalType(
    lineNetAmountData: new LineNetAmountDataType(
        lineNetAmount: 16000.0,
        lineNetAmountHUF: 5488000.0,
    ),
    lineVatRate: new VatRateType(
        vatPercentage: 0.27,
    ),
    lineVatData: new LineVatDataType(
        lineVatAmount: 4320.0,
        lineVatAmountHUF: 1481760.0,
    ),
    lineGrossAmountData: new LineGrossAmountDataType(
        lineGrossAmountNormal: 20320.0,
        lineGrossAmountNormalHUF: 6969760.0,
    ),
);

const LINE_AMOUNTS_SIMPLIFIED_TYPE_EXAMPLE = new LineAmountsSimplifiedType(
    lineVatRate: new VatRateType(
        vatPercentage: 0.27,
    ),
    lineGrossAmountSimplified: 10.0,
    lineGrossAmountSimplifiedHUF: 3860.0,
);

it('throws no exceptions', function () {
    new LineType(
        lineNumber: 1,
        lineExpressionIndicator: false,
        lineAmountsNormal: LINE_AMOUNTS_NORMAL_TYPE_EXAMPLE,
    );

    new LineType(
        lineNumber: 2,
        lineExpressionIndicator: false,
        lineAmountsSimplified: LINE_AMOUNTS_SIMPLIFIED_TYPE_EXAMPLE,
    );
})->throwsNoExceptions();

it('throws InvalidArgumentException', function () {
    new LineType(
        lineNumber: 2,
        lineExpressionIndicator: false,
        lineAmountsNormal: LINE_AMOUNTS_NORMAL_TYPE_EXAMPLE,
        lineAmountsSimplified: LINE_AMOUNTS_SIMPLIFIED_TYPE_EXAMPLE,
    );
})->throws(InvalidArgumentException::class);
