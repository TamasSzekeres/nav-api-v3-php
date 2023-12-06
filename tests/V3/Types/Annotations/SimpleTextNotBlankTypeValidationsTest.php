<?php

use LightSideSoftware\NavApi\V3\Providers\RandomProvider;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText100NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText1024NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText15NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText200NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText255NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText50NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\SimpleText512NotBlankTypeValidation;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

beforeEach(function () {
    $this->randomProvider = new RandomProvider();
});

test('simple text not blank type validations', function (string $validationClass) {
    /* @var $validation StringValidation */
    $validation  = new $validationClass();
    $longerString = $this->randomProvider->string($validation->maxLength + 1);

    expect($validation->validateProperty('value', '')->hasErrors())->toBeTrue()
        ->and($validation->validateProperty('value', 'A')->hasErrors())->toBeFalse()
        ->and($validation->validateProperty('value', ' ')->hasErrors())->toBeTrue()
        ->and($validation->validateProperty('value', $longerString)->hasErrors())->toBeTrue();

})->with([
    [SimpleText100NotBlankTypeValidation::class],
    [SimpleText1024NotBlankTypeValidation::class],
    [SimpleText15NotBlankTypeValidation::class],
    [SimpleText200NotBlankTypeValidation::class],
    [SimpleText255NotBlankTypeValidation::class],
    [SimpleText50NotBlankTypeValidation::class],
    [SimpleText512NotBlankTypeValidation::class],
]);
