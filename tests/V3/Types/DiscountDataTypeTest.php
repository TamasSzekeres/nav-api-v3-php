<?php

use LightSideSoftware\NavApi\V3\Types\DiscountDataType;

it('throws no exceptions', function () {
    new DiscountDataType(
        discountDescription: 'Discount 50%',
        discountValue: 5000.0,
        discountRate: 0.5,
    );
})->throwsNoExceptions();
