<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Factories;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use JetBrains\PhpStorm\ArrayShape;
use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use LightSideSoftware\NavApi\V3\Exceptions\ValidationException;
use LightSideSoftware\NavApi\V3\InvoiceServiceClient;
use LightSideSoftware\NavApi\V3\InvoiceServiceClientInterface;
use LightSideSoftware\NavApi\V3\Providers\DateTimeProvider;
use LightSideSoftware\NavApi\V3\Providers\RequestIdProviderInterface;
use LightSideSoftware\NavApi\V3\Providers\TimeAwareRequestIdProvider;
use LightSideSoftware\NavApi\V3\Types\Enums\SoftwareOperationType;
use LightSideSoftware\NavApi\V3\Types\SoftwareType;
use Psr\Clock\ClockInterface;

/**
 * Factory számla-szolgáltatás-kliens létrehozásához.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final class InvoiceServiceClientFactory
{
    /**
     * Éles környezet alap url-je.
     */
    public const ONLINESZAMLA_API_URL = 'https://api.onlineszamla.nav.gov.hu';

    /**
     * Teszt környezet alap url-je.
     */
    public const ONLINESZAMLA_API_TEST_URL = 'https://api-test.onlineszamla.nav.gov.hu';

    private string $baseUrl;

    private ?float $timeout = null;

    private string $login;

    private string $xmlSignKey;

    private string $xmlChangeKey;

    private string $password;

    private string $taxNumber;

    private string $softwareId;

    private string $softwareName;

    private SoftwareOperationType $softwareOperation;

    private string $softwareMainVersion;

    private string $softwareDevName;

    private string $softwareDevContact;

    private ?string $softwareDevCountryCode = null;

    private ?string $softwareDevTaxNumber = null;

    private RequestIdProviderInterface $requestIdProvider;

    private ClockInterface $dateTimeProvider;

    private ?MockHandler $mockHandler = null;

    public function __construct()
    {
    }

    /**
     * Éles környezet beállítása.
     *
     * @return $this
     */
    public function productionBaseUrl(): self
    {
        return $this->baseUrl(self::ONLINESZAMLA_API_URL);
    }

    /**
     * Teszt környezet beállítása.
     *
     * @return $this
     */
    public function testBaseUrl(): self
    {
        return $this->baseUrl(self::ONLINESZAMLA_API_TEST_URL);
    }

    /**
     * Visszaadja a beállított api url-t.
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * API url címének beállítása.
     *
     * @param string $baseUrl API url címe.
     * @return $this
     */
    public function baseUrl(string $baseUrl): self
    {
        $this->baseUrl = rtrim($baseUrl, '/');

        return $this;
    }

    /**
     * Visszaadja a beállított maximális megengedett API-hívás időtúllépésta.
     *
     * @return float|null
     */
    public function getTimeout(): ?float
    {
        return $this->timeout;
    }

    /**
     * Maximális megengedett API-hívás időtúllépés beállítása.
     *
     * @param float|null $timeout Időtúllépés másodperceben.
     * 0.0 vagy null érték jelenti hogy végtelen a várakozási idő.
     * @return $this
     */
    public function timeout(?float $timeout): self
    {
        $this->timeout = $timeout;

        return $this;
    }

    /**
     * Visszaadja a technikai felhasználó login nevet.
     *
     * @return string A technikai felhasználó login neve.
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * Beállítja a technikai felhasználó login nevet.
     *
     * @param string $login A technikai felhasználó login neve.
     * @return $this
     */
    public function login(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Visszaadja a felhasználó xml aláírókulcsát.
     * @return string Felhasználó xml aláírókulcsa.
     */
    public function getXmlSignKey(): string
    {
        return $this->xmlSignKey;
    }

    /**
     * Beállítja a felhasználó xml aláírókulcsát.
     *
     * @param string $xmlSignKey Felhasználó xml aláírókulcsa.
     * @return $this
     */
    public function xmlSignKey(string $xmlSignKey): self
    {
        $this->xmlSignKey = $xmlSignKey;

        return $this;
    }

    /**
     * Visszaadja a felhasználó xml cserekulcsát.
     *
     * @return string A felhasználó xml cserekulcsa.
     */
    public function getXmlChangeKey(): string
    {
        return $this->xmlChangeKey;
    }

    /**
     * Beállítja a felhasználó xml cserekulcsát.
     *
     * @param string $xmlChangeKey A felhasználó xml cserekulcsa.
     * @return $this
     */
    public function xmlChangeKey(string $xmlChangeKey): self
    {
        $this->xmlChangeKey = $xmlChangeKey;

        return $this;
    }

    /**
     * Visszaadja a felhasználó jelszavát.
     *
     * @return string A felhasználó jelszava.
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Beállítja a felhasználó jelszavát.
     *
     * @param string $password A felhasználó jelszava.
     * @return $this
     */
    public function password(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Visszaadja a felhasználó adószámát.
     *
     * @return string A felhasználó adószáma.
     */
    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }

    /**
     * Beállítja a felhasználó adószámát.
     *
     * @param string $taxNumber A felhasználó adószáma.
     * @return $this
     */
    public function taxNumber(string $taxNumber): self
    {
        $this->taxNumber = $taxNumber;

        return $this;
    }

    /**
     * Visszaadja a beállított kérés-id előállító objektumot.
     *
     * @return RequestIdProviderInterface Kérés-id előállító objektum.
     */
    public function getRequestIdProvider(): RequestIdProviderInterface
    {
        return $this->requestIdProvider;
    }

    /**
     * Beállítja a kérés-id előállító objektumot.
     *
     * @param RequestIdProviderInterface $requestIdProvider Kérés-id előállító objektum.
     * @return $this
     */
    public function requestIdProvider(RequestIdProviderInterface $requestIdProvider): self
    {
        $this->requestIdProvider = $requestIdProvider;

        return $this;
    }

    /**
     * Visszaadja a beállított időpont lekérdező objektumot.
     *
     * @return ClockInterface Időpont lekérő objektum.
     */
    public function getDateTimeProvider(): ClockInterface
    {
        return $this->dateTimeProvider;
    }

    /**
     * Beállítja az időpont lekérdező objektumot.
     *
     * @param ClockInterface $dateTimeProvider Időpont lekérő objektum.
     * @return $this
     */
    public function dateTimeProvider(ClockInterface $dateTimeProvider): self
    {
        $this->dateTimeProvider = $dateTimeProvider;

        return $this;
    }

    /**
     * Visszaadja beállított számlázó program azonosítót.
     *
     * @return string A számlázó program azonosítója.
     */
    public function getSoftwareId(): string
    {
        return $this->softwareId;
    }

    /**
     * Beállítja a számlázó program azonosítóját.
     *
     * @param string $softwareId A számlázó program azonosítója.
     * @return $this
     */
    public function softwareId(string $softwareId): self
    {
        $this->softwareId = $softwareId;

        return $this;
    }

    /**
     * Visszaadja a beállított számlázó program nevet.
     *
     * @return string A számlázó program neve.
     */
    public function getSoftwareName(): string
    {
        return $this->softwareName;
    }

    /**
     * Beállítja a számlázó program nevet.
     *
     * @param string $softwareName A számlázó program neve.
     * @return $this
     */
    public function softwareName(string $softwareName): self
    {
        $this->softwareName = $softwareName;

        return $this;
    }

    /**
     * Visszaadja a beállított számlázó program működési típust.
     *
     * @return SoftwareOperationType A számlázó program működési típusa.
     */
    public function getSoftwareOperation(): SoftwareOperationType
    {
        return $this->softwareOperation;
    }

    /**
     * Beállítja a számlázó program működési típusát.
     *
     * @param SoftwareOperationType $softwareOperation A számlázó program működési típusa.
     * @return $this
     */
    public function softwareOperation(SoftwareOperationType $softwareOperation): self
    {
        $this->softwareOperation = $softwareOperation;

        return $this;
    }

    /**
     * Visszaadja a beállított számlázó program fő verziót.
     *
     * @return string A számlázó program fő verziója.
     */
    public function getSoftwareMainVersion(): string
    {
        return $this->softwareMainVersion;
    }

    /**
     * Beállítja a számlázó program fő verzióját.
     *
     * @param string $softwareMainVersion A számlázó program fő verziója.
     * @return $this
     */
    public function softwareMainVersion(string $softwareMainVersion): self
    {
        $this->softwareMainVersion = $softwareMainVersion;

        return $this;
    }

    /**
     * Visszaadja a beállított számlázó program fejlesztő nevet.
     *
     * @return string A számlázó program fejlesztőjének neve.
     */
    public function getSoftwareDevName(): string
    {
        return $this->softwareDevName;
    }

    /**
     * Beállítja a számlázó program fejlesztőjének nevét.
     *
     * @param string $softwareDevName A számlázó program fejlesztőjének neve.
     * @return $this
     */
    public function softwareDevName(string $softwareDevName): self
    {
        $this->softwareDevName = $softwareDevName;

        return $this;
    }

    /**
     * Viszaadja a beállított számlázó program fejlesztőjének működő email címét.
     *
     * @return string A számlázó program fejlesztőjének működő email címe.
     */
    public function getSoftwareDevContact(): string
    {
        return $this->softwareDevContact;
    }

    /**
     * Beállítja a számlázó program fejlesztőjének működő email címét.
     *
     * @param string $softwareDevContact A számlázó program fejlesztőjének működő email címe.
     * @return $this
     */
    public function softwareDevContact(string $softwareDevContact): self
    {
        $this->softwareDevContact = $softwareDevContact;

        return $this;
    }

    /**
     * Visszaadja a beállított számlázó program fejlesztőjének országkódját.
     *
     * @return string|null  A számlázó program fejlesztőjének országkódja.
     */
    public function getSoftwareDevCountryCode(): ?string
    {
        return $this->softwareDevCountryCode;
    }

    /**
     * Beállítja a számlázó program fejlesztőjének országkódját.
     *
     * @param ?string $softwareDevCountryCode A számlázó program fejlesztőjének országkódja.
     * @return $this
     */
    public function softwareDevCountryCode(?string $softwareDevCountryCode): self
    {
        $this->softwareDevCountryCode = $softwareDevCountryCode;

        return $this;
    }

    /**
     * Visszaadja a bállított számlázó program fejleszőjének adószámát.
     *
     * @return string|null A számlázó program fejleszőjének adószáma.
     */
    public function getSoftwareDevTaxNumber(): ?string
    {
        return $this->softwareDevTaxNumber;
    }

    /**
     * Beállítja a számlázó program fejleszőjének adószámát.
     *
     * @param string|null $softwareDevTaxNumber A számlázó program fejleszőjének adószáma.
     * @return $this
     */
    public function softwareDevTaxNumber(?string $softwareDevTaxNumber): self
    {
        $this->softwareDevTaxNumber = $softwareDevTaxNumber;

        return $this;
    }

    /**
     * InvoiceServiceClientFactory példány létrehozása.
     *
     * @return InvoiceServiceClientFactory
     */
    public static function create(): InvoiceServiceClientFactory
    {
        return new InvoiceServiceClientFactory();
    }

    /**
     * @throws InvalidConfigException
     * @throws ValidationException
     */
    public function createClient(): InvoiceServiceClientInterface
    {
        $this->validate();

        $clientOptions = $this->makeHttpClientOptions();
        return $this->createInvoiceClient($clientOptions);
    }

    /**
     * Mock-olt kliens létrehozása tesztelés céljából.
     *
     * @param array<int, mixed>|null $queue Előredefiniált kérések.
     * @return InvoiceServiceClientInterface
     * @throws InvalidConfigException
     * @throws ValidationException
     */
    public function createClientMock(array $queue): InvoiceServiceClientInterface
    {
        $this->validate();

        $clientOptions = $this->makeHttpClientOptions();

        $this->mockHandler = new MockHandler($queue);
        $handlerStack = HandlerStack::create($this->mockHandler);
        $clientOptions['handler'] = $handlerStack;

        return $this->createInvoiceClient($clientOptions);
    }

    public function getMockHandler(): ?MockHandler
    {
        return $this->mockHandler;
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

    #[ArrayShape([
        'base_uri' => 'string',
        'headers' => 'array<string, string>',
        'timeout' => 'float|null',
    ])]
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
     * @throws ValidationException
     */
    private function createInvoiceClient(array $clientOptions): InvoiceServiceClient
    {
        $client = new Client($clientOptions);

        return new InvoiceServiceClient(
            $client,
            $this->login,
            $this->xmlSignKey,
            $this->xmlChangeKey,
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
            requestIdProvider: $this->requestIdProvider ?? new TimeAwareRequestIdProvider(),
            dateTimeProvider: $this->dateTimeProvider ?? new DateTimeProvider()
        );
    }
}
