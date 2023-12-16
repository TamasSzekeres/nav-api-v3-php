<?php

use LightSideSoftware\NavApi\V3\Types\VehicleType;

it('throws no exceptions', function () {
    new VehicleType(
        engineCapacity: 1600.0,
        enginePower: 680,
        kms: 15004.0,
    );
})->throwsNoExceptions();
