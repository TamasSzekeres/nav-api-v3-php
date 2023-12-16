<?php

use LightSideSoftware\NavApi\V3\Types\AircraftType;

it('throws no exceptions', function () {
    new AircraftType(
        takeOffWeight: 500.0,
        airCargo: false,
        operationHours: 1541.0,
    );
})->throwsNoExceptions();
