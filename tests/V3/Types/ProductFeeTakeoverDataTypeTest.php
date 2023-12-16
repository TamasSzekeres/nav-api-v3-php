<?php

use LightSideSoftware\NavApi\V3\Types\ProductFeeTakeoverDataType;

it('throws no exceptions', function () {
    new ProductFeeTakeoverDataType(
        takeoverReason: \LightSideSoftware\NavApi\V3\Types\Enums\TakeoverType::_02_eb,
        takeoverAmount: 1.0,
    );
})->throwsNoExceptions();
