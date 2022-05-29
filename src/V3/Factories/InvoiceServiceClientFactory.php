<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Factories;

use GuzzleHttp\Client;
use LightSideSoftware\NavApi\V3\InvoiceServiceClient;
use LightSideSoftware\NavApi\V3\InvoiceServiceClientInterface;
use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class InvoiceServiceClientFactory
{
    public const ONLINESZAMLA_API_URL = 'https://api.onlineszamla.nav.gov.hu';
    public const ONLINESZAMLA_API_TEST_URL = 'https://api-test.onlineszamla.nav.gov.hu';

    private string $baseUrl;

    private ?float $timeout;

    private string $login;

    private string $xmlSignKey;

    private string $password;

    private string $taxNumber;

    private SoftwareType $software;

    public function __construct()
    {
        $this->software = new SoftwareType();
    }

    public function setProductionBaseUrl(): self
    {
        return $this->setBaseUrl(self::ONLINESZAMLA_API_URL);
    }

    public function setTestBaseUrl(): self
    {
        return $this->setBaseUrl(self::ONLINESZAMLA_API_TEST_URL);
    }

    public function setBaseUrl(string $baseUrl): self
    {
        $this->baseUrl = rtrim($baseUrl, '/');

        return $this;
    }

    public function setTimeout(?float $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function setXmlSignKey(string $xmlSignKey): self
    {
        $this->xmlSignKey = $xmlSignKey;

        return $this;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function setTaxNumber(string $taxNumber): self
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    public function setSoftware(SoftwareType $software): self
    {
        $this->software = $software;

        return $this;
    }

    public function setSoftwareId(string $softwareId): self
    {
        $this->software->softwareId = $softwareId;

        return $this;
    }

    public function setSoftwareName(string $softwareName): self
    {
        $this->software->softwareName = $softwareName;

        return $this;
    }

    public function setSoftwareOperation(string $softwareOperation): self
    {
        $this->software->softwareOperation = $softwareOperation;

        return $this;
    }

    public function setSoftwareMainVersion(string $softwareMainVersion): self
    {
        $this->software->softwareMainVersion = $softwareMainVersion;

        return $this;
    }

    public function setSoftwareDevName(string $softwareDevName): self
    {
        $this->software->softwareDevName = $softwareDevName;

        return $this;
    }

    public function setSoftwareDevContact(string $softwareDevContact): self
    {
        $this->software->softwareDevContact = $softwareDevContact;

        return $this;
    }

    public function setSoftwareDevCountryCode(string $softwareDevCountryCode): self
    {
        $this->software->softwareDevCountryCode = $softwareDevCountryCode;

        return $this;
    }

    public static function create(): InvoiceServiceClientFactory
    {
        return new InvoiceServiceClientFactory();
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
            $this->software
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
