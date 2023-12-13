<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Factories;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use LightSideSoftware\NavApi\V3\InvoiceServiceClient;
use LightSideSoftware\NavApi\V3\InvoiceServiceClientInterface;
use LightSideSoftware\NavApi\V3\Providers\DateTimeProvider;
use LightSideSoftware\NavApi\V3\Providers\RequestIdProviderInterface;
use LightSideSoftware\NavApi\V3\Providers\TimeAwareRequestIdProvider;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use Psr\Clock\ClockInterface;

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

    private string $softwareId;

    private string $softwareName;

    private SoftwareOperationType $softwareOperation;

    private string $softwareMainVersion;

    private string $softwareDevName;

    private string $softwareDevContact;

    private string $softwareDevCountryCode;

    private string $softwareDevTaxNumber;

    private RequestIdProviderInterface $requestIdProvider;

    private ClockInterface $dateTimeProvider;

    public function __construct()
    {
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

    public function requestIdProvider(RequestIdProviderInterface $requestIdProvider): self
    {
        $this->requestIdProvider = $requestIdProvider;

        return $this;
    }

    public function dateTimeProvider(ClockInterface $dateTimeProvider): self
    {
        $this->dateTimeProvider = $dateTimeProvider;

        return $this;
    }

    public function softwareId(string $softwareId): self
    {
        $this->softwareId = $softwareId;

        return $this;
    }

    public function softwareName(string $softwareName): self
    {
        $this->softwareName = $softwareName;

        return $this;
    }

    public function softwareOperation(SoftwareOperationType $softwareOperation): self
    {
        $this->softwareOperation = $softwareOperation;

        return $this;
    }

    public function softwareMainVersion(string $softwareMainVersion): self
    {
        $this->softwareMainVersion = $softwareMainVersion;

        return $this;
    }

    public function softwareDevName(string $softwareDevName): self
    {
        $this->softwareDevName = $softwareDevName;

        return $this;
    }

    public function softwareDevContact(string $softwareDevContact): self
    {
        $this->softwareDevContact = $softwareDevContact;

        return $this;
    }

    public function softwareDevCountryCode(string $softwareDevCountryCode): self
    {
        $this->softwareDevCountryCode = $softwareDevCountryCode;

        return $this;
    }

    public function softwareDevTaxNumber(string $softwareDevTaxNumber): self
    {
        $this->softwareDevTaxNumber = $softwareDevTaxNumber;

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
        return $this->createInvoiceClient($clientOptions);
    }

    /**
     * @param array<int, mixed>|null $queue The parameters to be passed to the append function, as an indexed array.
     * @return InvoiceServiceClientInterface
     * @throws InvalidConfigException
     */
    public function createClientMock(array $queue): InvoiceServiceClientInterface
    {
        $this->validate();

        $clientOptions = $this->makeHttpClientOptions();

        $mock = new MockHandler($queue);
        $handlerStack = HandlerStack::create($mock);
        $clientOptions['handler'] = $handlerStack;

        return $this->createInvoiceClient($clientOptions);
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

    /**
     * @param array $clientOptions
     * @return InvoiceServiceClient
     */
    protected function createInvoiceClient(array $clientOptions): InvoiceServiceClient
    {
        $client = new Client($clientOptions);

        return new InvoiceServiceClient(
            $client,
            $this->login,
            $this->xmlSignKey,
            $this->password,
            $this->taxNumber,
            new SoftwareType(
                $this->softwareId,
                $this->softwareName,
                $this->softwareOperation,
                $this->softwareMainVersion,
                $this->softwareDevName,
                $this->softwareDevContact,
                $this->softwareDevCountryCode,
                $this->softwareDevTaxNumber,
            ),
            $this->requestIdProvider ?? new TimeAwareRequestIdProvider(),
            $this->dateTimeProvider ?? new DateTimeProvider()
        );
    }
}
