<?php

namespace LightSideSoftware\NavApi\V3\Providers;

interface RandomProviderInterface
{
    public function number(int $min, int $max): int;

    public function string(int $length): string;
}
