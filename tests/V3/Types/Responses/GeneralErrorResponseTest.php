<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\Enums\TechnicalResultCodeType;
use LightSideSoftware\NavApi\V3\Types\Responses\GeneralErrorResponse;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\TechnicalValidationResultType;

test('create general-error-response from xml', function () {
    $responseXml = loadTestResponse('GeneralErrorResponse');

    $response = GeneralErrorResponse::fromXml($responseXml);

    expect($response->header)->toBeInstanceOf(BasicHeaderType::class)
        ->and($response->header->requestId)->toBe('RID215118906689')
        ->and($response->header->timestamp)->toEqualDateTimeImmutable(new DateTimeImmutable('2021-09-20 19:16:05.000'))
        ->and($response->header->requestVersion)->toBe('3.0')
        ->and($response->header->headerVersion)->toBe('1.0')
        ->and($response->result)->toBeInstanceOf(BasicResultType::class)
        ->and($response->result->funcCode)->toBe(FunctionCodeType::ERROR)
        ->and($response->result->errorCode)->toBe('INVALID_REQUEST_SIGNATURE')
        ->and($response->result->message)->toBe('Érvénytelen kérés aláírás!')
        ->and($response->software)->toBeInstanceOf(SoftwareType::class)
        ->and($response->software->softwareId)->toBe('123456789123456789')
        ->and($response->software->softwareName)->toBe('Test Online Számlázó')
        ->and($response->software->softwareOperation)->toBe(SoftwareOperationType::ONLINE_SERVICE)
        ->and($response->software->softwareMainVersion)->toBe('1.0')
        ->and($response->software->softwareDevName)->toBe('Test Software Kft.')
        ->and($response->software->softwareDevContact)->toBe('test@example.com')
        ->and($response->software->softwareDevCountryCode)->toBe('HU')
        ->and($response->software->softwareDevTaxNumber)->toBe('12345678')
        ->and($response->technicalValidationMessages)->toBeArray()
        ->and($response->technicalValidationMessages)->toHaveCount(1)
        ->and($response->technicalValidationMessages[0])->toBeInstanceOf(TechnicalValidationResultType::class)
        ->and($response->technicalValidationMessages[0]->validationResultCode)->toBe(TechnicalResultCodeType::CRITICAL)
        ->and($response->technicalValidationMessages[0]->validationErrorCode)->toBe('100')
        ->and($response->technicalValidationMessages[0]->message)->toBe('Message');
});

it('throws no exceptions', function () {
    new GeneralErrorResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        technicalValidationMessages: [
            new TechnicalValidationResultType(
                validationResultCode: TechnicalResultCodeType::CRITICAL,
                validationErrorCode: '100',
                message: 'Message',
            ),
        ],
    );
})->throwsNoExceptions();

it('throws InvalidValidationException', function () {
    new GeneralErrorResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        technicalValidationMessages: [
            new TechnicalValidationResultType(
                validationResultCode: TechnicalResultCodeType::CRITICAL,
                validationErrorCode: ' ',
                message: 'Message',
            ),
        ],
    );
})->throws(ValidationException::class);
