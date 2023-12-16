<?php

use LightSideSoftware\NavApi\V3\Types\DetailedReasonType;

it('throws no exceptions', function () {
    new DetailedReasonType(
        case: 'CASE_001',
        reason: 'REASON_001',
    );
})->throwsNoExceptions();
