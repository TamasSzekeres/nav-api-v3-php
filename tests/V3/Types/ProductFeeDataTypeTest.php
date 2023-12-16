<?php

use LightSideSoftware\NavApi\V3\Types\Enums\ProductCodeCategoryType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductFeeMeasuringUnitType;
use LightSideSoftware\NavApi\V3\Types\ProductCodeType;
use LightSideSoftware\NavApi\V3\Types\ProductFeeDataType;

it('throws no exceptions', function () {
    new ProductFeeDataType(
        productFeeCode: new ProductCodeType(
            productCodeCategory: ProductCodeCategoryType::OWN,
            productCodeOwnValue: 'PCOV001',
        ),
        productFeeQuantity: 1.0,
        productFeeMeasuringUnit: ProductFeeMeasuringUnitType::DARAB,
        productFeeRate: 1.0,
        productFeeAmount: 1.0,
    );
})->throwsNoExceptions();
