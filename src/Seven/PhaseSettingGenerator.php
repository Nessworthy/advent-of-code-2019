<?php declare(strict_types=1);

namespace Nessworthy\AOC\Seven;

class PhaseSettingGenerator
{
    public function generateCombinations(array $of): \Generator
    {
        yield from $this->generateSmallCombination([], $of);
    }

    private function generateSmallCombination(array $current, array $remaining): \Generator
    {
        if (count($remaining) > 1) {
            foreach ($remaining as $key => $item) {
                $currentCopy = $current;
                $remainingCopy = $remaining;
                $currentCopy[] = $remaining[$key];
                unset($remainingCopy[$key]);
                yield from $this->generateSmallCombination($currentCopy, $remainingCopy);
            }
        } else {
            $current[] = array_shift($remaining);
            yield $current;
        }
    }
}
