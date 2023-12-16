<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\AdditionalDataType;

it('throws no exceptions', function () {
    new AdditionalDataType(
        dataName: 'D00001_A1',
        dataDescription: 'data-1',
        dataValue: 'value-1',
    );
})->throwsNoExceptions();

it('throws ValidationException', function () {
    new AdditionalDataType(
        dataName: ';00001_A1',
        dataDescription: ' ',
        dataValue: ' ',
    );
})->throws(ValidationException::class);
