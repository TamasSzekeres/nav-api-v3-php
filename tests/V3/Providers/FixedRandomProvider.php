<?php

declare(strict_types=1);

namespace LightSideSoftware\NavApi\V3\Providers;

use InvalidArgumentException;

/**
 * @author Szekeres Tamás <szektam2@gmail.com>
 */
final class FixedRandomProvider extends RandomProvider
{
    private int $position = 0;

    /**
     * @var array<int, float>
     */
    private array $normalizedNumbers = [];

    public function __construct(array $fixedNumbers)
    {
        if (empty($fixedNumbers)) {
            throw new InvalidArgumentException('fixedNumber paraméter nem lehet üres!');
        }

        $this->normalizedNumbers = $this->normalizeNumbers($fixedNumbers);
    }

    public function number(int $min, int $max): int
    {
        $index = ($this->position++) % count($this->normalizedNumbers);
        $normalizedNumber = $this->normalizedNumbers[$index];
        $range = $max - $min;

        return intval($normalizedNumber * $range + $min);
    }

    /**
     * @param array<int, int> $fixedNumbers
     * @return array<int, float>
     */
    private function normalizeNumbers(array $fixedNumbers): array
    {
        /* @var $min int */
        /* @var $max int */
        [$min, $max] = array_reduce($fixedNumbers, function (array $minMax, int $number) {
            [$min, $max] = $minMax;

            if (is_null($min) || ($number < $min)) {
                $min = $number;
            }

            if (is_null($max) || ($number > $max)) {
                $max = $number;
            }

            return [$min, $max];
        }, [null, null]);

        $range = floatval($max - $min);

        return array_map(function (int $number) use ($min, $range) {
            if ($range == 0.0) {
                return 0.0;
            }

            return ($number - $min) / $range;
        }, $fixedNumbers);
    }
}
