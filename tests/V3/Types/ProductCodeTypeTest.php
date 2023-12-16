<?php

use LightSideSoftware\NavApi\V3\Types\Enums\ProductCodeCategoryType;
use LightSideSoftware\NavApi\V3\Types\ProductCodeType;

it('throws no exceptions', function () {
    new ProductCodeType(
        productCodeCategory: ProductCodeCategoryType::VTSZ,
        productCodeValue: '16010091',
    );

    new ProductCodeType(
        productCodeCategory: ProductCodeCategoryType::VTSZ,
        productCodeOwnValue: '4534-4254',
    );
})->throwsNoExceptions();

it('throws InvalidArgumentException', function (
    ?string $productCodeValue,
    ?string $productCodeOwnValue
) {
    new ProductCodeType(
        productCodeCategory: ProductCodeCategoryType::OTHER,
        productCodeValue: $productCodeValue,
        productCodeOwnValue: $productCodeOwnValue,
    );
})->with([
    [null, null],
    ['16010091', '4534-4254']
])->throws(InvalidArgumentException::class);
