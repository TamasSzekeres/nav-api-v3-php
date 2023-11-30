<?php

namespace LightSideSoftware\NavApi\V3\Providers;

class TimeAwareRequestIdProvider implements RequestIdProviderInterface
{
    public function __construct(
        private readonly DateTimeProviderInterface $dateTimeProvider = new DateTimeProvider(),
        private readonly RandomProviderInterface $randomProvider = new RandomProvider(),
        private readonly string $prefix = 'RID'
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
        if ($requestIdLength >= 30) {
            return substr($requestId, 0, 30);
        }

        return $requestId . $this->randomProvider->string(30 - $requestIdLength);
    }
}
