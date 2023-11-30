<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Providers;

final class IncrementalRequestIdProvider implements RequestIdProviderInterface
{
    public function __construct(
        private int $requestId = 1,
        private readonly string $prefix = 'RID'
    ) {
    }

    public function nextRequestId(): string
    {
        $requestId = $this->getPrefix() . str_pad(strval($this->requestId), 10, '0', STR_PAD_LEFT);

        $this->requestId++;

        return $requestId;
    }

    public function getPrefix(): string
    {
        return $this->prefix;
    }
}
