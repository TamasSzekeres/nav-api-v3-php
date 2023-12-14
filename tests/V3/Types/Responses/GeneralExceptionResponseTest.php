<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\NotificationType;
use LightSideSoftware\NavApi\V3\Types\Responses\GeneralExceptionResponse;

test('create general-exception-response from xml', function () {
    $responseXml = loadTestResponse('GeneralExceptionResponse');

    $response = GeneralExceptionResponse::fromXml($responseXml);

    expect($response)->toBeInstanceOf(GeneralExceptionResponse::class)
        ->and($response->funcCode)->toBe(FunctionCodeType::ERROR)
        ->and($response->errorCode)->toBe('INVALID_REQUEST')
        ->and($response->message)->toBe('Érvénytelen kérés!')
        ->and($response->notifications)->toBeArray()
        ->and($response->notifications)->toHaveCount(2)
        ->and($response->notifications[0])->toBeInstanceOf(NotificationType::class)
        ->and($response->notifications[0]->notificationCode)->toBe('N001')
        ->and($response->notifications[0]->notificationText)->toBe('Notification 001')
        ->and($response->notifications[1])->toBeInstanceOf(NotificationType::class)
        ->and($response->notifications[1]->notificationCode)->toBe('N002')
        ->and($response->notifications[1]->notificationText)->toBe('Notification 002');
});

it('throws ValidationException', function () {
    new GeneralExceptionResponse(
        funcCode: FunctionCodeType::ERROR,
        errorCode: ' ',
    );
})->throws(ValidationException::class);
