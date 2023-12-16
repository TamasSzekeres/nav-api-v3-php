<?php

use LightSideSoftware\NavApi\V3\Types\AdvanceDataType;

it('throws no exception', function () {
    new AdvanceDataType(
        advanceIndicator: false,
        advancePaymentData: null,
    );
})->throwsNoExceptions();
