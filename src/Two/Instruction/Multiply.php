<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two\Instruction;

use Nessworthy\AOC\Two\Instruction;
use Nessworthy\AOC\Two\Order;
use Nessworthy\AOC\Two\Parameter;

class Multiply implements Instruction
{
    public function getParameterCount(): int
    {
        return 3;
    }

    public function execute(Parameter ...$parameters): Order
    {
        [$a, $b, $outputLocation] = $parameters;
        return new Order\WriteToCodeLocation($outputLocation->getCode(), $a->getValue() * $b->getValue());
    }
}
