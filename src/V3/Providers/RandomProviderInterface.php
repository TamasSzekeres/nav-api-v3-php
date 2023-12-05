<?php

namespace LightSideSoftware\NavApi\V3\Providers;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
interface RandomProviderInterface
{
    public function number(int $min, int $max): int;

    public function string(int $length): string;
}
