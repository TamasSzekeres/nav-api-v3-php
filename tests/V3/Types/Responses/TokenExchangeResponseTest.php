<?php

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\BasicResultType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\Responses\TokenExchangeResponse;

test('fromXml', function () {
    $responseXml = <<<XML
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<ns2:TokenExchangeResponse
    xmlns="http://schemas.nav.gov.hu/NTCA/1.0/common"
    xmlns:ns2="http://schemas.nav.gov.hu/OSA/3.0/api"
    xmlns:ns3="http://schemas.nav.gov.hu/OSA/3.0/base"
    xmlns:ns4="http://schemas.nav.gov.hu/OSA/3.0/data">
    <header>
        <requestId>RID215118906689</requestId>
        <timestamp>2021-09-20T19:16:05.000Z</timestamp>
        <requestVersion>3.0</requestVersion>
        <headerVersion>1.0</headerVersion>
    </header>
    <result>
        <funcCode>OK</funcCode>
    </result>
    <ns2:software>
        <ns2:softwareId>123456789123456789</ns2:softwareId>
        <ns2:softwareName>Test Online Számlázó</ns2:softwareName>
        <ns2:softwareOperation>ONLINE_SERVICE</ns2:softwareOperation>
        <ns2:softwareMainVersion>1.0</ns2:softwareMainVersion>
        <ns2:softwareDevName>Test Software Kft.</ns2:softwareDevName>
        <ns2:softwareDevContact>test@example.com</ns2:softwareDevContact>
        <ns2:softwareDevCountryCode>HU</ns2:softwareDevCountryCode>
        <ns2:softwareDevTaxNumber>66445533</ns2:softwareDevTaxNumber>
    </ns2:software>
    <ns2:encodedExchangeToken>VqJlBJwJGk2Uta7pfa0wTzyWjFGxItxoGTnYgbZCjOCXaQsWJqX5Iao4iw7uh0CU7cnWwtawHkbpLUbQi/wE6Q==</ns2:encodedExchangeToken>
    <ns2:tokenValidityFrom>2021-09-20T19:16:06.333Z</ns2:tokenValidityFrom>
    <ns2:tokenValidityTo>2021-09-20T19:21:06.333Z</ns2:tokenValidityTo>
</ns2:TokenExchangeResponse>
XML;

    $response = TokenExchangeResponse::fromXml($responseXml);

    expect($response->header)->toBeInstanceOf(BasicHeaderType::class);
    expect($response->header->requestId)->toBe('RID215118906689');
    expect($response->header->timestamp)->toBe('2021-09-20T19:16:05.000Z');
    expect($response->header->requestVersion)->toBe('3.0');
    expect($response->header->headerVersion)->toBe('1.0');

    expect($response->result)->toBeInstanceOf(BasicResultType::class);
    expect($response->result->funcCode)->toBe('OK');

    expect($response->software)->toBeInstanceOf(SoftwareType::class);
    expect($response->software->softwareId)->toBe('123456789123456789');
    expect($response->software->softwareName)->toBe('Test Online Számlázó');
    expect($response->software->softwareOperation)->toBe('ONLINE_SERVICE');
    expect($response->software->softwareMainVersion)->toBe('1.0');
    expect($response->software->softwareDevName)->toBe('Test Software Kft.');
    expect($response->software->softwareDevContact)->toBe('test@example.com');
    expect($response->software->softwareDevCountryCode)->toBe('HU');
    expect($response->software->softwareDevTaxNumber)->toBe('66445533');

    expect($response->encodedExchangeToken)->toBe('VqJlBJwJGk2Uta7pfa0wTzyWjFGxItxoGTnYgbZCjOCXaQsWJqX5Iao4iw7uh0CU7cnWwtawHkbpLUbQi/wE6Q==');
    expect($response->tokenValidityFrom)->toBe('2021-09-20T19:16:06.333Z');
    expect($response->tokenValidityTo)->toBe('2021-09-20T19:21:06.333Z');
});