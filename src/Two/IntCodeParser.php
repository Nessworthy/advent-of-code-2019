<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two;

use Generator;
use RuntimeException;

class IntCodeParser
{
    private function intCodeGenerator(array &$items): Generator
    {
        $pointer = 0;
        while ($pointer < count($items)) {
            yield $items[$pointer];
            ++$pointer;
        }
    }

    /**
     * @param int[] $intCodes
     * @return int
     */
    public function execute(array $intCodes): int
    {
        $intCodeGenerator = $this->intCodeGenerator($intCodes);

        foreach ($intCodeGenerator as $instruction) {
            switch ($instruction) {
                case 1:
                    [$input1, $input2, $target] = $this->readNextCodes(3, $intCodeGenerator);
                    $intCodes[$target] = $intCodes[$input1] + $intCodes[$input2];
                    break;
                case 2:
                    [$input1, $input2, $target] = $this->readNextCodes(3, $intCodeGenerator);
                    $intCodes[$target] = $intCodes[$input1] * $intCodes[$input2];
                    break;
                case 99;
                    break 2;
                default:
                    throw new RuntimeException('Hit an unexpected int code!');
            }
        }
        return $intCodes[0];
    }

    private function readNextCodes(int $codes, Generator $generator): array
    {
        $return = [];
        for ($current = 0; $current < $codes; ++$current) {
            $generator->next();
            $return[] = $generator->current();
        }
        return $return;
    }
}
