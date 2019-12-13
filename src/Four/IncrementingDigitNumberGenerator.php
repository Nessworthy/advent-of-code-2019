<?php declare(strict_types=1);

namespace Nessworthy\AOC\Four;

use Generator;
use Nessworthy\AOC\Utils;

class IncrementingDigitNumberGenerator
{
    public function generateForFourOne(int $from, int $to, callable $predicate): Generator
    {
        $number = $from;

        while ($number < $to) {
            ++$number;
            $digits = array_map([Utils::class, 'castToInt'], str_split((string) $number));

            $resetTo = null;
            $digits = $this->mapWithPrevious($digits, static function (int $prev, int $curr) use (&$resetTo) {
                if ($resetTo !== null) {
                    return $resetTo;
                }
                if ($prev > $curr) {
                    $resetTo = $prev;
                    return $prev;
                }
                return $curr;
            });
            $number = (int) implode('', $digits);

            if ($number < $to && $predicate($digits)) {
                yield $number;
            }
        }
    }

    private function mapWithPrevious(array $array, callable $callable, $skipFirst = true): array
    {
        $prev = null;

        $skippedFirst = !$skipFirst;

        foreach ($array as $key => $item)
        {
            if (!$skippedFirst) {
                $skippedFirst = true;
                $prev = $item;
                continue;
            }
            $prev = $callable($prev, $item);
            $array[$key] = $prev;
        }

        return $array;
    }
}
