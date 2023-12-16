<?php

use LightSideSoftware\NavApi\V3\Types\AircraftType;
use LightSideSoftware\NavApi\V3\Types\NewTransportMeanType;
use LightSideSoftware\NavApi\V3\Types\VehicleType;
use LightSideSoftware\NavApi\V3\Types\VesselType;

const VEHICLE_TYPE_EXAMPLE = new VehicleType(
    engineCapacity: 1600.0,
    enginePower: 680,
    kms: 15004.0,
);

const VESSEL_TYPE_EXAMPLE = new VesselType(
    length: 8.1,
    activityReferred: false,
    sailedHours: 475.0,
);

const AIRCRAFT_TYPE_EXAMPLE = new AircraftType(
    takeOffWeight: 500.0,
    airCargo: false,
    operationHours: 1541.0,
);

it('throws not exceptions', function () {
    new NewTransportMeanType(vehicle: VEHICLE_TYPE_EXAMPLE);
    new NewTransportMeanType(vessel: VESSEL_TYPE_EXAMPLE);
    new NewTransportMeanType(aircraft: AIRCRAFT_TYPE_EXAMPLE);
})->throwsNoExceptions();

it('throws InvalidArgumentException', function (
    ?VehicleType $vehicle,
    ?VesselType $vessel,
    ?AircraftType $aircraft,
) {
    new NewTransportMeanType(
        vehicle: $vehicle,
        vessel: $vessel,
        aircraft: $aircraft,
    );
})->with([
    [null, null, null],
    [VEHICLE_TYPE_EXAMPLE, VESSEL_TYPE_EXAMPLE, null],
    [VEHICLE_TYPE_EXAMPLE, null, AIRCRAFT_TYPE_EXAMPLE],
    [null, VESSEL_TYPE_EXAMPLE, AIRCRAFT_TYPE_EXAMPLE],
    [VEHICLE_TYPE_EXAMPLE, VESSEL_TYPE_EXAMPLE, AIRCRAFT_TYPE_EXAMPLE],
])->throws(InvalidArgumentException::class);
