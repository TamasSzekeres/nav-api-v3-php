<?php

use LightSideSoftware\NavApi\V3\Types\Enums\OriginalRequestVersionType;

test('toVersionString', function (
    OriginalRequestVersionType $actualType,
    string $expectedStringRepresentation
) {
    expect($actualType->value)
        ->toEqual($expectedStringRepresentation);
})->with([
    [OriginalRequestVersionType::VERSION_1_0, '1.0'],
    [OriginalRequestVersionType::VERSION_1_1, '1.1'],
    [OriginalRequestVersionType::VERSION_2_0, '2.0'],
    [OriginalRequestVersionType::VERSION_3_0, '3.0'],
]);
