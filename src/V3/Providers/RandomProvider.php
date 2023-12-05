<?php

namespace LightSideSoftware\NavApi\V3\Providers;

use InvalidArgumentException;

use function rand;
use function strlen;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
class RandomProvider implements RandomProviderInterface
{
    public function number(int $min, int $max): int
    {
        return rand($min, $max);
    }

    public function string(int $length): string
    {
        if ($length < 0) {
            throw new InvalidArgumentException('Length parameter must be greater or equal to 0.');
        }

        if ($length == 0) {
            return '';
        }

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersCount = strlen($characters);

        $string = '';
        for ($i = 0; $i < $length; ++$i) {
            $characterIndex = $this->number(0, $charactersCount - 1);
            $string .= $characters[$characterIndex];
        }

        return $string;
    }
}
