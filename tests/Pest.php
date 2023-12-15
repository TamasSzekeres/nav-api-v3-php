<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use GuzzleHttp\Psr7\Response;
use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\CryptoType;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

expect()->extend('toEqualDateTimeImmutable', function (DateTimeImmutable $dateTimeImmutable) {
    return $this->toBeInstanceOf(DateTimeImmutable::class)
        ->and($this->value->getTimestamp())->toEqual($dateTimeImmutable->getTimestamp());
});

function loadTestFile(string $fileName): string
{
    $filePath = join(DIRECTORY_SEPARATOR, [
        __DIR__,
        'V3',
        'Data',
        $fileName,
    ]);

    return file_get_contents($filePath);
}

function loadTestRequest(string $requestName): string
{
    $filePath = join(DIRECTORY_SEPARATOR, [
        'Requests',
        "$requestName.xml",
    ]);
    return loadTestFile($filePath);
}

function loadTestResponse(string $responseName): string
{
    $filePath = join(DIRECTORY_SEPARATOR, [
        'Responses',
        "$responseName.xml",
    ]);
    return loadTestFile($filePath);
}

function createResponseFromXml(string $xmlResponse, int $status = 200): Response
{
    return new Response(
        status: $status,
        headers: [
            'Content-Type' => 'application/xml',
            'Content-Length' => strlen($xmlResponse),
        ],
        body: $xmlResponse,
    );
}

const BASIC_HEADER_TYPE_EXAMPLE = new BasicHeaderType(
    requestId: 'RID215118906689',
    timestamp: new DateTimeImmutable('2021-09-20 19:16:05.000'),
    requestVersion: '3.0',
    headerVersion: '1.0',
);

const USER_HEADER_TYPE_EXAMPLE = new UserHeaderType(
    login: 'abcdefghijklmno',
    passwordHash: new CryptoType(
        cryptoType: 'SHA-512',
        hash: '1234567890ABCDEFABCDEF01234567890ABCDEFABCDEF0123456789ABCDEFABCDEF0123456789ABCDEFABCDEF0123456789ABCDEABCDEF0123456789ABCDEFAB',
    ),
    taxNumber: '12345678',
    requestSignature: new CryptoType(
        cryptoType: 'SHA3-512',
        hash: 'ABCDEFABCDEF01234567890ABCDEFABCDEF0123456789ABCDEFABCDEF0123456789ABCDEFABCDEF0123456789ABCDEABCDEF0123456789ABCDEFAB1234567890',
    ),
);

const SOFTWARE_TYPE_EXAMPLE = new SoftwareType(
    softwareId: '123456789123456789',
    softwareName: 'Teszt Online Számlázó',
    softwareOperation: SoftwareOperationType::ONLINE_SERVICE,
    softwareMainVersion: '1.0',
    softwareDevName: 'Test Software Kft.',
    softwareDevContact: 'test@example.com',
    softwareDevCountryCode: 'HU',
    softwareDevTaxNumber: '12345678',
);
