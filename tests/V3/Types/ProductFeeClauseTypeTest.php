<?php

use LightSideSoftware\NavApi\V3\Types\CustomerDeclarationType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductStreamType;
use LightSideSoftware\NavApi\V3\Types\Enums\TakeoverType;
use LightSideSoftware\NavApi\V3\Types\ProductFeeClauseType;
use LightSideSoftware\NavApi\V3\Types\ProductFeeTakeoverDataType;

it('throws no exceptions', function () {
    new ProductFeeClauseType(
        productFeeTakeoverData: new ProductFeeTakeoverDataType(
            takeoverReason: TakeoverType::_02_eb,
            takeoverAmount: 1.0,
        ),
    );

    new ProductFeeClauseType(
        customerDeclaration: new CustomerDeclarationType(
            productStream: ProductStreamType::PAPER,
            productFeeWeight: 1.0,
        ),
    );
})->throwsNoExceptions();

it('throws InvalidArgumentException because of missing parameter', function () {
    new ProductFeeClauseType();
})->throws(InvalidArgumentException::class);

it('throws InvalidArgumentException because of exclusive parameters', function () {
    new ProductFeeClauseType(
        productFeeTakeoverData: new ProductFeeTakeoverDataType(
            takeoverReason: TakeoverType::_02_eb,
            takeoverAmount: 1.0,
        ),
        customerDeclaration: new CustomerDeclarationType(
            productStream: ProductStreamType::PAPER,
            productFeeWeight: 1.0,
        ),
    );
})->throws(InvalidArgumentException::class);
