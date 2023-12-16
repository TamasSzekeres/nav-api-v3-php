<?php

use LightSideSoftware\NavApi\V3\Types\VesselType;

it('throws no exceptions', function () {
    new VesselType(
        length: 8.1,
        activityReferred: false,
        sailedHours: 475.0,
    );
})->throwsNoExceptions();
