<?php

use LightSideSoftware\NavApi\V3\Types\VatRateType;

it('throws no exception', function () {
    new VatRateType(
        vatPercentage: 0.27,
    );
})->throwsNoExceptions();

it('throws InvalidArgumentException', function (
    ?bool $vatDomesticReverseCharge,
    ?bool $noVatCharge,
) {
    new VatRateType(
        vatDomesticReverseCharge: $vatDomesticReverseCharge,
        noVatCharge: $noVatCharge,
    );
})->with([
    [null, null],
    [false, null],
    [null, false],
    [true, true],
])->throws(InvalidArgumentException::class);
