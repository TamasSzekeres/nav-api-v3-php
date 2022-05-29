<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Factories;

use GuzzleHttp\Client;
use LightSideSoftware\NavApi\V3\Exceptions\InvalidConfigException;
use LightSideSoftware\NavApi\V3\MetricServiceClient;
use LightSideSoftware\NavApi\V3\MetricServiceClientInterface;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
final class MetricServiceClientFactory
{
    public const ONLINESZAMLA_API_URL = 'https://api.onlineszamla.nav.gov.hu';
    public const ONLINESZAMLA_API_TEST_URL = 'https://api-test.onlineszamla.nav.gov.hu';

    private string $baseUrl;

    private ?float $timeout = null;

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

    public static function create(): MetricServiceClientFactory
    {
        return new MetricServiceClientFactory();
    }

    /**
     * @throws InvalidConfigException
     */
    public function createClient(): MetricServiceClientInterface
    {
        $this->validate();

        $clientOptions = $this->makeHttpClientOptions();
        $client = new Client($clientOptions);

        return new MetricServiceClient($client);
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
