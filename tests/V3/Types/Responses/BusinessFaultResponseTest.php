<?php

use LightSideSoftware\NavApi\V3\Types\ContextType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Responses\BusinessFaultResponse;

test('create BusinessFaultResponse from xml', function () {
    $responseXml = loadTestResponse('BusinessFault');
    $response = BusinessFaultResponse::fromXml($responseXml);

    expect($response)->toBeInstanceOf(BusinessFaultResponse::class)
        ->and($response->context)->toBeInstanceOf(ContextType::class)
        ->and($response->context->requestId)->toBe('4ESKFA3RIDLWCRJ6')
        ->and($response->context->timestamp)->toEqualDateTimeImmutable(new DateTimeImmutable('2023-12-15 16:22:47.271936'))
        ->and($response->funcCode)->toBe(FunctionCodeType::ERROR)
        ->and($response->message)->toBe('A kért erőforrás nem található!')
        ->and($response->faultType)->toBe('RESOURCE_NOT_FOUND')
        ->and($response->service)->toBe('metric');
});

it('throws no exceptions', function () {
    new BusinessFaultResponse(
        context: new ContextType(
            requestId: '4ESKFA3RIDLWCRJ6',
            timestamp: new DateTimeImmutable('2023-12-15 16:22:47.271936'),
        ),
        funcCode: FunctionCodeType::ERROR,
        message: 'Message',
        faultType: 'RESOURCE_NOT_FOUND',
        service: 'metric',
    );
})->throwsNoExceptions();
