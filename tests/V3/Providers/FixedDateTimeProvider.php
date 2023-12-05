<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Providers;

use DateTimeImmutable;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class FixedDateTimeProvider implements DateTimeProviderInterface
{
    public function __construct(private DateTimeImmutable $dateTime)
    {
    }

    public function now(): DateTimeImmutable
    {
        return $this->dateTime;
    }
}
