<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\Validation\ErrorBag;

test('creating ValidationException', function () {
    $errors = new ErrorBag();
    $errors->addError('test', 'Error');

    $exception = new ValidationException('Message', $errors);

    expect($exception->getValidationErrors())->toBeInstanceOf(ErrorBag::class)
        ->and($exception->getValidationErrors()->hasErrors('test'))->toBeTrue();
});
