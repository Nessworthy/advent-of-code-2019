<?php declare(strict_types=1);

namespace Nessworthy\AOC\One;

class FuelCalculator
{
    public static function calculateFuel(int $cost): int
    {
        return (int) max(0, floor($cost / 3) - 2);
    }

    public static function calculateFuelWithFuelModule(int $cost): int
    {
        $total = 0;
        while ($cost > 0) {
            $cost = self::calculateFuel($cost);
            $total += $cost;
        }
        return $total;
    }
}
