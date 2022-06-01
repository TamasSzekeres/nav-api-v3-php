<?php

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\CryptoType;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryTaxpayerRequest;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

test('toXml', function () {
    $header = new BasicHeaderType([
        'requestId' => 'RID215118906689',
        'timestamp' => new DateTimeImmutable('2021-09-20 19:16:05'),
        'requestVersion' => '3.0',
        'headerVersion' => '1.0',
    ]);

    $user = new UserHeaderType([
        'login' => 'w7kkwc4sjpwghz3',
        'passwordHash' => new CryptoType([
            'cryptoType' => 'SHA-512',
            'hash' => '49E73661331C3A6E20E781E1C57AA1050BA9B1A0A2EFB346E485CA013AF594E63963FF2CC164B6811B51912EECDBA92AC8CE50D9736C34D02DDC713CA8287CA0'
        ]),
        'taxNumber' => '55745031',
        'requestSignature' => new CryptoType([
            'cryptoType' => 'SHA3-512',
            'hash' => '7EFBBB3D1DF87EB2935F16C1B1D672DE066F558F8CB548320EA5360D019A3C30627FA60B15A66633014940E86F4CEC2B0C5B5D035E82E32B2DE8DBA8942849D0'
        ]),
    ]);

    $software = new SoftwareType([
        'softwareId' => '123456789123456789',
        'softwareName' => 'Teszt Online Számlázó',
        'softwareOperation' => 'ONLINE_SERVICE',
        'softwareMainVersion' => '1.0',
        'softwareDevName' => 'Test Software Kft.',
        'softwareDevContact' => 'test@example.com',
        'softwareDevCountryCode' => 'HU',
        'softwareDevTaxNumber' => '12345678',
    ]);

    $request = new QueryTaxpayerRequest([
        'header' => $header,
        'user' => $user,
        'software' => $software,
        'taxNumber' => '12345678',
    ]);

    $expected = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL
        . '<QueryTaxpayerRequest xmlns="http://schemas.nav.gov.hu/OSA/3.0/api" xmlns:common="http://schemas.nav.gov.hu/NTCA/1.0/common"><common:header><common:requestId>RID215118906689</common:requestId><common:timestamp>2021-09-20T19:16:05.000Z</common:timestamp><common:requestVersion>3.0</common:requestVersion><common:headerVersion>1.0</common:headerVersion></common:header><common:user><common:login>w7kkwc4sjpwghz3</common:login><common:passwordHash cryptoType="SHA-512">49E73661331C3A6E20E781E1C57AA1050BA9B1A0A2EFB346E485CA013AF594E63963FF2CC164B6811B51912EECDBA92AC8CE50D9736C34D02DDC713CA8287CA0</common:passwordHash><common:taxNumber>55745031</common:taxNumber><common:requestSignature cryptoType="SHA3-512">7EFBBB3D1DF87EB2935F16C1B1D672DE066F558F8CB548320EA5360D019A3C30627FA60B15A66633014940E86F4CEC2B0C5B5D035E82E32B2DE8DBA8942849D0</common:requestSignature></common:user><software><softwareId>123456789123456789</softwareId><softwareName>Teszt Online Számlázó</softwareName><softwareOperation>ONLINE_SERVICE</softwareOperation><softwareMainVersion>1.0</softwareMainVersion><softwareDevName>Test Software Kft.</softwareDevName><softwareDevContact>test@example.com</softwareDevContact><softwareDevCountryCode>HU</softwareDevCountryCode><softwareDevTaxNumber>12345678</softwareDevTaxNumber></software><taxNumber>12345678</taxNumber></QueryTaxpayerRequest>' . PHP_EOL;

    $xml = $request->toXml(false);

    expect($xml)->toEqual($expected);
});
