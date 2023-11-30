<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Factories;

use GuzzleHttp\Client;
use LightSideSoftware\NavApi\V3\InvoiceServiceClient;
use LightSideSoftware\NavApi\V3\InvoiceServiceClientInterface;
use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use LightSideSoftware\NavApi\V3\Providers\DateTimeProvider;
use LightSideSoftware\NavApi\V3\Providers\DateTimeProviderInterface;
use LightSideSoftware\NavApi\V3\Providers\RequestIdProviderInterface;
use LightSideSoftware\NavApi\V3\Providers\TimeAwareRequestIdProvider;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceServiceClientFactory
{
    public const ONLINESZAMLA_API_URL = 'https://api.onlineszamla.nav.gov.hu';
    public const ONLINESZAMLA_API_TEST_URL = 'https://api-test.onlineszamla.nav.gov.hu';

    private string $baseUrl;

    private ?float $timeout = null;

    private string $login;

    private string $xmlSignKey;

    private string $password;

    private string $taxNumber;

    private SoftwareType $software;

    private RequestIdProviderInterface $requestIdProvider;

    private DateTimeProviderInterface $dateTimeProvider;

    public function __construct()
    {
        $this->software = new SoftwareType();
    }

    public function productionBaseUrl(): self
    {
        return $this->baseUrl(self::ONLINESZAMLA_API_URL);
    }

    public function testBaseUrl(): self
    {
        return $this->baseUrl(self::ONLINESZAMLA_API_TEST_URL);
    }

    public function baseUrl(string $baseUrl): self
    {
        $this->baseUrl = rtrim($baseUrl, '/');

        return $this;
    }

    public function timeout(?float $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function login(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function xmlSignKey(string $xmlSignKey): self
    {
        $this->xmlSignKey = $xmlSignKey;

        return $this;
    }

    public function password(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function taxNumber(string $taxNumber): self
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    public function software(SoftwareType $software): self
    {
        $this->software = $software;

        return $this;
    }

    public function requestIdProvider(RequestIdProviderInterface $requestIdProvider): self
    {
        $this->requestIdProvider = $requestIdProvider;

        return $this;
    }

    public function dateTimeProvider(DateTimeProviderInterface $dateTimeProvider): self
    {
        $this->dateTimeProvider = $dateTimeProvider;

        return $this;
    }

    public function softwareId(string $softwareId): self
    {
        $this->software->softwareId = $softwareId;

        return $this;
    }

    public function softwareName(string $softwareName): self
    {
        $this->software->softwareName = $softwareName;

        return $this;
    }

    public function softwareOperation(string $softwareOperation): self
    {
        $this->software->softwareOperation = $softwareOperation;

        return $this;
    }

    public function softwareMainVersion(string $softwareMainVersion): self
    {
        $this->software->softwareMainVersion = $softwareMainVersion;

        return $this;
    }

    public function softwareDevName(string $softwareDevName): self
    {
        $this->software->softwareDevName = $softwareDevName;

        return $this;
    }

    public function softwareDevContact(string $softwareDevContact): self
    {
        $this->software->softwareDevContact = $softwareDevContact;

        return $this;
    }

    public function softwareDevCountryCode(string $softwareDevCountryCode): self
    {
        $this->software->softwareDevCountryCode = $softwareDevCountryCode;

        return $this;
    }

    public function softwareDevTaxNumber(string $softwareDevTaxNumber): self
    {
        $this->software->softwareDevTaxNumber = $softwareDevTaxNumber;

        return $this;
    }

    public static function create(): self
    {
        return new self();
    }

    /**
     * @throws InvalidConfigException
     */
    public function createClient(): InvoiceServiceClientInterface
    {
        $this->validate();

        $clientOptions = $this->makeHttpClientOptions();
        $client = new Client($clientOptions);

        return new InvoiceServiceClient(
            $client,
            $this->login,
            $this->xmlSignKey,
            $this->password,
            $this->taxNumber,
            $this->software,
            $this->requestIdProvider ?? new TimeAwareRequestIdProvider(),
            $this->dateTimeProvider ?? new DateTimeProvider()
        );
    }

    /**
     * @throws InvalidConfigException
     */
    private function validate(): void
    {
        if (empty($this->baseUrl)) {
            throw new InvalidConfigException("Client's base-url cannot be empty!");
        }
    }

    private function makeHttpClientOptions(): array
    {
        $options['base_uri'] = $this->baseUrl;

        $options['headers'] = [
            'Accept' => 'application/xml',
            'Content-Type' => 'application/xml',
        ];

        if (is_float($this->timeout)) {
            $options['timeout'] = $this->timeout;
        }

        return $options;
    }
}
