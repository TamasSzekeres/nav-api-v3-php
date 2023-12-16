<?php

use LightSideSoftware\NavApi\V3\Types\SummaryByVatRateType;
use LightSideSoftware\NavApi\V3\Types\SummaryNormalType;
use LightSideSoftware\NavApi\V3\Types\SummarySimplifiedType;
use LightSideSoftware\NavApi\V3\Types\SummaryType;
use LightSideSoftware\NavApi\V3\Types\VatRateNetDataType;
use LightSideSoftware\NavApi\V3\Types\VatRateType;
use LightSideSoftware\NavApi\V3\Types\VatRateVatDataType;

const SUMMARY_NORMAL_TYPE_EXAMPLE = new SummaryNormalType(
    summaryByVatRate: new SummaryByVatRateType(
        vatRate: new VatRateType(
            vatPercentage: 0.27,
        ),
        vatRateNetData: new VatRateNetDataType(
            vatRateNetAmount: 4000.0,
            vatRateNetAmountHUF: 1372000.0,
        ),
        vatRateVatData: new VatRateVatDataType(
            vatRateVatAmount: 1080.0,
            vatRateVatAmountHUF: 370440.0,
        ),
    ),
    invoiceNetAmount: 4000.0,
    invoiceNetAmountHUF: 1372000.0,
    invoiceVatAmount: 1080.0,
    invoiceVatAmountHUF: 370440.0,
);

const SUMMARY_SIMPLIFIED_TYPE_EXAMPLE = new SummarySimplifiedType(
    vatRate: new VatRateType(
        vatDomesticReverseCharge: true,
    ),
    vatContentGrossAmount: 1000,
    vatContentGrossAmountHUF: 386000,
);

it('throws no exceptions', function () {
    new SummaryType(
        summaryNormal: SUMMARY_NORMAL_TYPE_EXAMPLE,
    );

    new SummaryType(
        summarySimplified: SUMMARY_SIMPLIFIED_TYPE_EXAMPLE,
    );
})->throwsNoExceptions();

it('throws InvalidArgumentException', function (
    ?SummaryNormalType $summaryNormal,
   ?SummarySimplifiedType $summarySimplified,
) {
    new SummaryType(
        summaryNormal: $summaryNormal,
        summarySimplified: $summarySimplified,
    );
})->with([
    [null, null],
    [SUMMARY_NORMAL_TYPE_EXAMPLE, SUMMARY_SIMPLIFIED_TYPE_EXAMPLE],
])->throws(InvalidArgumentException::class);
