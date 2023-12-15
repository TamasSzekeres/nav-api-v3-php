<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Factories;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use JetBrains\PhpStorm\ArrayShape;
use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use LightSideSoftware\NavApi\V3\MetricServiceClient;
use LightSideSoftware\NavApi\V3\MetricServiceClientInterface;

/**
 * Factory metrika-szolgáltatás-kliens létrehozásához.
 *
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final class MetricServiceClientFactory
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

    private ?MockHandler $mockHandler = null;

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
     * MetricServiceClientFactory példány létrehozása.
     *
     * @return MetricServiceClientFactory
     */
    public static function create(): MetricServiceClientFactory
    {
        return new MetricServiceClientFactory();
    }

    /**
     * Metrika-szolgáltatás-kliens példány létrehozása.
     *
     * @throws InvalidConfigException
     */
    public function createClient(): MetricServiceClientInterface
    {
        $this->validate();

        $clientOptions = $this->makeHttpClientOptions();

        return $this->createMetricClient($clientOptions);
    }

    /**
     * Mock-olt kliens létrehozása tesztelés céljából.
     *
     * @param array<int, mixed> $queue Előredefiniált kérések.
     * @return MetricServiceClientInterface
     * @throws InvalidConfigException
     */
    public function createClientMock(array $queue): MetricServiceClientInterface
    {
        $this->validate();

        $clientOptions = $this->makeHttpClientOptions();

        $this->mockHandler = new MockHandler($queue);
        $handlerStack = HandlerStack::create($this->mockHandler);
        $clientOptions['handler'] = $handlerStack;

        return $this->createMetricClient($clientOptions);
    }

    public function getMockHandler(): ?MockHandler
    {
        return $this->mockHandler;
    }

    private function createMetricClient(array $clientOptions): MetricServiceClientInterface
    {
        $client = new Client($clientOptions);

        return new MetricServiceClient($client);
    }

    /**
     * @throws InvalidConfigException
     */
    private function validate(): void
    {
        if (empty($this->baseUrl)) {
            throw new InvalidConfigException('API-url nem lehet üres!');
        }
    }

    #[ArrayShape([
        'base_url' => 'string',
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
}
