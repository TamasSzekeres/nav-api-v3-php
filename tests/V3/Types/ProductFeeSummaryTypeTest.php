<?php

use LightSideSoftware\NavApi\V3\Types\Enums\ProductCodeCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductFeeMeasuringUnitType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductFeeOperationType;
use LightSideSoftware\NavApi\V3\Types\ProductCodeType;
use LightSideSoftware\NavApi\V3\Types\ProductFeeDataType;
use LightSideSoftware\NavApi\V3\Types\ProductFeeSummaryType;

it('throws no exceptions', function () {
    new ProductFeeSummaryType(
        productFeeOperation: ProductFeeOperationType::DEPOSIT,
        productFeeData: [
            new ProductFeeDataType(
                productFeeCode: new ProductCodeType(
                    productCodeCategory: ProductCodeCategoryType::VTSZ,
                    productCodeValue: '16010091',
                ),
                productFeeQuantity: 1.0,
                productFeeMeasuringUnit: ProductFeeMeasuringUnitType::DARAB,
                productFeeRate: 1.0,
                productFeeAmount: 10.0,
            ),
        ],
        productChargeSum: 2034.0
    );
})->throwsNoExceptions();
