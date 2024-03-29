<?php

use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\Responses\TokenExchangeResponse;
use LightSideSoftware\NavApi\V3\Util;

test('create token-exchange-response from xml', function () {
    $responseXml = loadTestResponse('TokenExchangeResponse');

    $response = TokenExchangeResponse::fromXml($responseXml);

    expect($response->header)->toBeInstanceOf(BasicHeaderType::class)
        ->and($response->header->requestId)->toBe('RID215118906689')
        ->and($response->header->timestamp)->toEqualDateTimeImmutable(new DateTimeImmutable('2021-09-20 19:16:05.000'))
        ->and($response->header->requestVersion)->toBe('3.0')
        ->and($response->header->headerVersion)->toBe('1.0')
        ->and($response->result)->toBeInstanceOf(BasicResultType::class)
        ->and($response->result->funcCode)->toBe(FunctionCodeType::OK)
        ->and($response->software)->toBeInstanceOf(SoftwareType::class)
        ->and($response->software->softwareId)->toBe('123456789123456789')
        ->and($response->software->softwareName)->toBe('Test Online Számlázó')
        ->and($response->software->softwareOperation)->toBe(SoftwareOperationType::ONLINE_SERVICE)
        ->and($response->software->softwareMainVersion)->toBe('1.0')
        ->and($response->software->softwareDevName)->toBe('Test Software Kft.')
        ->and($response->software->softwareDevContact)->toBe('test@example.com')
        ->and($response->software->softwareDevCountryCode)->toBe('HU')
        ->and($response->software->softwareDevTaxNumber)->toBe('66445533')
        ->and($response->encodedExchangeToken)->toBe('VqJlBJwJGk2Uta7pfa0wTzyWjFGxItxoGTnYgbZCjOCXaQsWJqX5Iao4iw7uh0CU7cnWwtawHkbpLUbQi/wE6Q==')
        ->and($response->tokenValidityFrom)->toEqualDateTimeImmutable(new DateTimeImmutable('2021-09-20T19:16:06.333Z'))
        ->and($response->tokenValidityTo)->toEqualDateTimeImmutable(new DateTimeImmutable('2021-09-20T19:21:06.333Z'));
});

it('throws no exceptions', function () {
    new TokenExchangeResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::OK,
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        encodedExchangeToken: Util::encryptAes128('test-date', 'test-key'),
        tokenValidityFrom: new DateTimeImmutable('2020-01-01 12:00:00'),
        tokenValidityTo: new DateTimeImmutable('2020-01-01 13:00:00'),
    );
})->throwsNoExceptions();

it('throws InvalidValidationException', function () {
    new TokenExchangeResponse(
        header: BASIC_HEADER_TYPE_EXAMPLE,
        result: new BasicResultType(
            funcCode: FunctionCodeType::ERROR,
            errorCode: ' ',
            message: ' ',
        ),
        software: SOFTWARE_TYPE_EXAMPLE,
        encodedExchangeToken: Util::encryptAes128('test-date', 'test-key'),
        tokenValidityFrom: new DateTimeImmutable('2000-01-01 12:00:00'),
        tokenValidityTo: new DateTimeImmutable('2000-01-01 13:00:00'),
    );
})->throws(ValidationException::class);
