<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Providers;

use DateTimeImmutable;

/**
 * @author Tamás Szekeres <szektam2@gmail.com>
 */
class DateTimeProvider implements DateTimeProviderInterface
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
