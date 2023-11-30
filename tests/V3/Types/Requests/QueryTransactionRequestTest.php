<?php

use LightSideSoftware\NavApi\V3\Types\BasicHeaderType;
use LightSideSoftware\NavApi\V3\Types\CryptoType;
use LightSideSoftware\NavApi\V3\Types\Requests\QueryTransactionRequest;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use LightSideSoftware\NavApi\V3\Types\UserHeaderType;

test('toXml', function () {
    $header = new BasicHeaderType(
        requestId: 'RID603063244730',
        timestamp: new DateTimeImmutable('2019-09-11 10:55:34.063'),
        requestVersion: '3.0',
        headerVersion: '1.0',
    );

    $user = new UserHeaderType(
        login: 'lwilsmn0uqdxe6u',
        passwordHash: new CryptoType(
            cryptoType: 'SHA-512',
            hash: '2F43840A882CFDB7DB0FEC07D419D030D864B47B6B541DC280EF81B937B7A176E33C052B0D26638CC18A7A2C08D8D311733078A774BF43F6CA57FE8CD74DC28E'
        ),
        taxNumber: '55745031',
        requestSignature: new CryptoType(
            cryptoType: 'SHA3-512',
            hash: '3461426EDF923610281B5B24562F2EBA44A3118FEB7CCDD299B7ACAA6E7A5EA889B1965F1E3372F7F34064AC16C867958704089C9354F150248754D45C9A36F5'
        ),
    );

    $software = new SoftwareType(
        softwareId: '123456789123456789',
        softwareName: 'Teszt Online Számlázó',
        softwareOperation: 'LOCAL_SOFTWARE',
        softwareMainVersion: '1.0',
        softwareDevName: 'Test Software Kft.',
        softwareDevContact: 'test@example.com',
        softwareDevCountryCode: 'HU',
        softwareDevTaxNumber: '12345678',
    );

    $request = new QueryTransactionRequest(
        header: $header,
        user: $user,
        software: $software,
        transactionId: 'string',
        returnOriginalRequest: false,
    );

    $expected = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL
        . '<QueryTransactionRequest xmlns="http://schemas.nav.gov.hu/OSA/3.0/api" xmlns:common="http://schemas.nav.gov.hu/NTCA/1.0/common"><common:header><common:requestId>RID603063244730</common:requestId><common:timestamp>2019-09-11T10:55:34.063Z</common:timestamp><common:requestVersion>3.0</common:requestVersion><common:headerVersion>1.0</common:headerVersion></common:header><common:user><common:login>lwilsmn0uqdxe6u</common:login><common:passwordHash cryptoType="SHA-512">2F43840A882CFDB7DB0FEC07D419D030D864B47B6B541DC280EF81B937B7A176E33C052B0D26638CC18A7A2C08D8D311733078A774BF43F6CA57FE8CD74DC28E</common:passwordHash><common:taxNumber>55745031</common:taxNumber><common:requestSignature cryptoType="SHA3-512">3461426EDF923610281B5B24562F2EBA44A3118FEB7CCDD299B7ACAA6E7A5EA889B1965F1E3372F7F34064AC16C867958704089C9354F150248754D45C9A36F5</common:requestSignature></common:user><software><softwareId>123456789123456789</softwareId><softwareName>Teszt Online Számlázó</softwareName><softwareOperation>LOCAL_SOFTWARE</softwareOperation><softwareMainVersion>1.0</softwareMainVersion><softwareDevName>Test Software Kft.</softwareDevName><softwareDevContact>test@example.com</softwareDevContact><softwareDevCountryCode>HU</softwareDevCountryCode><softwareDevTaxNumber>12345678</softwareDevTaxNumber></software><transactionId>string</transactionId><returnOriginalRequest>false</returnOriginalRequest></QueryTransactionRequest>' . PHP_EOL;

    $xml = $request->toXml(false);

    expect($xml)->toEqual($expected);
});
