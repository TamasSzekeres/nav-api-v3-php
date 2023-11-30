<?php

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\Enums\FunctionCodeType;
use LightSideSoftware\NavApi\V3\Types\Responses\GeneralErrorResponse;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

test('fromXml', function () {
    $responseXml = <<<XML
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<ns2:GeneralErrorResponse
    xmlns="http://schemas.nav.gov.hu/NTCA/1.0/common"
    xmlns:ns2="http://schemas.nav.gov.hu/OSA/3.0/api"
    xmlns:ns3="http://schemas.nav.gov.hu/OSA/3.0/base"
    xmlns:ns4="http://schemas.nav.gov.hu/OSA/3.0/data"
>
    <header>
        <requestId>RID215118906689</requestId>
        <timestamp>2021-09-20T19:16:05.000Z</timestamp>
        <requestVersion>3.0</requestVersion>
        <headerVersion>1.0</headerVersion>
    </header>
    <result>
        <funcCode>ERROR</funcCode>
        <errorCode>INVALID_REQUEST_SIGNATURE</errorCode>
        <message>Érvénytelen kérés aláírás!</message>
    </result>
    <ns2:software>
        <ns2:softwareId>123456789123456789</ns2:softwareId>
        <ns2:softwareName>Test Online Számlázó</ns2:softwareName>
        <ns2:softwareOperation>ONLINE_SERVICE</ns2:softwareOperation>
        <ns2:softwareMainVersion>1.0</ns2:softwareMainVersion>
        <ns2:softwareDevName>Test Software Kft.</ns2:softwareDevName>
        <ns2:softwareDevContact>test@example.com</ns2:softwareDevContact>
        <ns2:softwareDevCountryCode>HU</ns2:softwareDevCountryCode>
        <ns2:softwareDevTaxNumber>12345678</ns2:softwareDevTaxNumber>
    </ns2:software>
</ns2:GeneralErrorResponse>
XML;

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
        ->and($response->software->softwareOperation)->toBe('ONLINE_SERVICE')
        ->and($response->software->softwareMainVersion)->toBe('1.0')
        ->and($response->software->softwareDevName)->toBe('Test Software Kft.')
        ->and($response->software->softwareDevContact)->toBe('test@example.com')
        ->and($response->software->softwareDevCountryCode)->toBe('HU')
        ->and($response->software->softwareDevTaxNumber)->toBe('12345678');
});
