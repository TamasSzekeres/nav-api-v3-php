<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Providers;

use DateTimeImmutable;
use Psr\Clock\ClockInterface;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
class DateTimeProvider implements ClockInterface
{
    public function now(): DateTimeImmutable
    {
        return new DateTimeImmutable();
    }
}
