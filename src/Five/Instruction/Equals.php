<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\Instruction;

use Nessworthy\AOC\Two\Instruction;
use Nessworthy\AOC\Two\Order;
use Nessworthy\AOC\Two\Parameter;

class Equals implements Instruction
{
    public function getParameterCount(): int
    {
        return 3;
    }

    public function execute(Parameter ...$parameters): Order
    {
        [$a, $b, $location] = $parameters;
        return new Order\WriteToCodeLocation($location->getCode(),$a->getValue() === $b->getValue() ? 1 : 0);
    }
}
