<?php

use LightSideSoftware\NavApi\V3\Types\Validation\ErrorBag;

beforeEach(function () {
   $this->errorBag = new ErrorBag();
});

test('adding and checking errors', function () {
    $expectedErrors = [
        'name' => ['Error 1!', 'Error 2!'],
        'password' => ['Error 3!'],
    ];

    $expectedMessages = [
        'Error 1!',
        'Error 2!',
        'Error 3!',
    ];

    expect($this->errorBag->hasErrors())->toBeFalse()
        ->and($this->errorBag->hasErrors('name'))->toBeFalse();

    $this->errorBag->addError('name', 'Error 1!');
    $this->errorBag->addError('name', 'Error 2!');
    $this->errorBag->addError('password', 'Error 3!');

    expect($this->errorBag->getErrors())->toBe($expectedErrors)
        ->and($this->errorBag->hasErrors())->toBeTrue()
        ->and($this->errorBag->hasErrors('name'))->toBeTrue()
        ->and($this->errorBag->getMessages())->toBe($expectedMessages);
});

test('merging errors', function () {
    $expectedErrors = [
        'name' => ['Error 1!', 'Error 2!'],
        'password' => ['Error 3!', 'Error 4!'],
    ];

    $secondErrorBag = new ErrorBag();

    $this->errorBag->addError('name', 'Error 1!');
    $this->errorBag->addError('password', 'Error 3!');
    $secondErrorBag->addError('name', 'Error 2!');
    $secondErrorBag->addError('password', 'Error 4!');

    $this->errorBag->merge($secondErrorBag);

    expect($this->errorBag->getErrors())->toBe($expectedErrors);
});
