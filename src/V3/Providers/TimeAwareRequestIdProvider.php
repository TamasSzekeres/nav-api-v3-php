<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Providers;

use Psr\Clock\ClockInterface;

use function strlen;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
readonly class TimeAwareRequestIdProvider implements RequestIdProviderInterface
{
    public function __construct(
        private ClockInterface $dateTimeProvider = new DateTimeProvider(),
        private RandomProviderInterface $randomProvider = new RandomProvider(),
        private string $prefix = 'RID'
    ) {
    }

    public function nextRequestId(): string
    {
        $timestamp = $this->dateTimeProvider->now()->format('YmdHis');
        return $this->addSuffix($this->prefix . $timestamp);
    }

    protected function addSuffix(string $requestId): string
    {
        $requestIdLength = strlen($requestId);

        return $requestId . $this->randomProvider->string(30 - $requestIdLength);
    }
}
