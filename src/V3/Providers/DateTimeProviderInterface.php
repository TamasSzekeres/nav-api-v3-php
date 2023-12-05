<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Providers;

use DateTimeImmutable;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
interface DateTimeProviderInterface
{
    public function now(): DateTimeImmutable;
}
