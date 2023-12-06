<?php

use LightSideSoftware\NavApi\V3\Providers\RandomProvider;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType100Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType1024Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType128Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType15Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType16Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType200Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType2048Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType255Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType256Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType2Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType32Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType4000Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType4Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType50Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType512Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType64Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\AtomicStringType8Validation;
use LightSideSoftware\NavApi\V3\Types\Annotations\StringValidation;

beforeEach(function () {
    $this->randomProvider = new RandomProvider();
});

test('atomic string type validations', function (string $validationClass) {
    /* @var $validation StringValidation */
    $validation  = new $validationClass();
    $longerString = $this->randomProvider->string($validation->maxLength + 1);

    expect($validation->validateProperty('value', '')->hasErrors())->toBeTrue()
        ->and($validation->validateProperty('value', 'A')->hasErrors())->toBeFalse()
        ->and($validation->validateProperty('value', ' ')->hasErrors())->toBeFalse()
        ->and($validation->validateProperty('value', $longerString)->hasErrors())->toBeTrue();

})->with([
    [AtomicStringType100Validation::class],
    [AtomicStringType1024Validation::class],
    [AtomicStringType128Validation::class],
    [AtomicStringType15Validation::class],
    [AtomicStringType16Validation::class],
    [AtomicStringType200Validation::class],
    [AtomicStringType2048Validation::class],
    [AtomicStringType255Validation::class],
    [AtomicStringType256Validation::class],
    [AtomicStringType2Validation::class],
    [AtomicStringType32Validation::class],
    [AtomicStringType4000Validation::class],
    [AtomicStringType4Validation::class],
    [AtomicStringType50Validation::class],
    [AtomicStringType512Validation::class],
    [AtomicStringType64Validation::class],
    [AtomicStringType8Validation::class],
]);
