<?php

use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use LightSideSoftware\NavApi\V3\InvoiceServiceClientInterface;
use LightSideSoftware\NavApi\V3\Factories\InvoiceServiceClientFactory;
use LightSideSoftware\NavApi\V3\Providers\DateTimeProvider;
use LightSideSoftware\NavApi\V3\Providers\RequestIdProviderInterface;
use LightSideSoftware\NavApi\V3\Providers\TimeAwareRequestIdProvider;
use Psr\Clock\ClockInterface;

test('create invoice-service-client by factory', function () {
    $password = 'abcdef123456';
    $xmlSignKey = 'b4-133b-76d407367df44KM7891IKOL';
    $xmlChangeKey = '12dd6DV674G451ZQ';

    $factory = InvoiceServiceClientFactory::create()
        ->productionBaseUrl()
        ->dateTimeProvider(new DateTimeProvider())
        ->requestIdProvider(new TimeAwareRequestIdProvider())
        ->timeout(3.0)
        ->login(USER_HEADER_TYPE_EXAMPLE->login)
        ->password($password)
        ->taxNumber(USER_HEADER_TYPE_EXAMPLE->taxNumber)
        ->xmlSignKey($xmlSignKey)
        ->xmlChangeKey($xmlChangeKey)
        ->softwareId(SOFTWARE_TYPE_EXAMPLE->softwareId)
        ->softwareName(SOFTWARE_TYPE_EXAMPLE->softwareName)
        ->softwareOperation(SOFTWARE_TYPE_EXAMPLE->softwareOperation)
        ->softwareMainVersion(SOFTWARE_TYPE_EXAMPLE->softwareMainVersion)
        ->softwareDevName(SOFTWARE_TYPE_EXAMPLE->softwareDevName)
        ->softwareDevContact(SOFTWARE_TYPE_EXAMPLE->softwareDevContact)
        ->softwareDevCountryCode(SOFTWARE_TYPE_EXAMPLE->softwareDevCountryCode)
        ->softwareDevTaxNumber(SOFTWARE_TYPE_EXAMPLE->softwareDevTaxNumber);

    $client = $factory->createClient();

    expect($factory->getBaseUrl())->toBe(InvoiceServiceClientFactory::ONLINESZAMLA_API_URL)
        ->and($factory->getTimeout())->toBe(3.0)
        ->and($factory->getDateTimeProvider())->toBeInstanceOf(ClockInterface::class)
        ->and($factory->getRequestIdProvider())->toBeInstanceOf(RequestIdProviderInterface::class)
        ->and($factory->getLogin())->toBe(USER_HEADER_TYPE_EXAMPLE->login)
        ->and($factory->getPassword())->toBe($password)
        ->and($factory->getTaxNumber())->toBe(USER_HEADER_TYPE_EXAMPLE->taxNumber)
        ->and($factory->getXmlSignKey())->toBe($xmlSignKey)
        ->and($factory->getXmlChangeKey())->toBe($xmlChangeKey)
        ->and($factory->getSoftwareId())->toBe(SOFTWARE_TYPE_EXAMPLE->softwareId)
        ->and($factory->getSoftwareName())->toBe(SOFTWARE_TYPE_EXAMPLE->softwareName)
        ->and($factory->getSoftwareOperation())->toBe(SOFTWARE_TYPE_EXAMPLE->softwareOperation)
        ->and($factory->getSoftwareMainVersion())->toBe(SOFTWARE_TYPE_EXAMPLE->softwareMainVersion)
        ->and($factory->getSoftwareDevName())->toBe(SOFTWARE_TYPE_EXAMPLE->softwareDevName)
        ->and($factory->getSoftwareDevContact())->toBe(SOFTWARE_TYPE_EXAMPLE->softwareDevContact)
        ->and($factory->getSoftwareDevCountryCode())->toBe(SOFTWARE_TYPE_EXAMPLE->softwareDevCountryCode)
        ->and($factory->getSoftwareDevTaxNumber())->toBe(SOFTWARE_TYPE_EXAMPLE->softwareDevTaxNumber)
        ->and($client)->toBeInstanceOf(InvoiceServiceClientInterface::class);
});

it('throws InvalidConfigException', function () {
    InvoiceServiceClientFactory::create()
        ->createClient();
})->throws(InvalidConfigException::class);
