<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Providers;

use DateTimeImmutable;
use Psr\Clock\ClockInterface;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final readonly class FixedDateTimeProvider implements ClockInterface
{
    public function __construct(private DateTimeImmutable $dateTime)
    {
    }

    public function now(): DateTimeImmutable
    {
        return $this->dateTime;
    }
}
