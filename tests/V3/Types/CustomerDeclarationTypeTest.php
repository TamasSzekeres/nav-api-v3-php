<?php

use LightSideSoftware\NavApi\V3\Types\CustomerDeclarationType;
use LightSideSoftware\NavApi\V3\Types\Enums\ProductStreamType;

it('throws no exceptions', function () {
    new CustomerDeclarationType(
        productStream: ProductStreamType::PAPER,
        productFeeWeight: 10.0,
    );
})->throwsNoExceptions();
