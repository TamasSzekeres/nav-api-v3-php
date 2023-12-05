<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Providers;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
interface RequestIdProviderInterface
{
    public function nextRequestId(): string;
}
