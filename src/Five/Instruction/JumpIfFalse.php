<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\Instruction;

use Nessworthy\AOC\Five\Order\MovePointerToLocation;
use Nessworthy\AOC\Five\Order\NoOperation;
use Nessworthy\AOC\Two\Instruction;
use Nessworthy\AOC\Two\Order;
use Nessworthy\AOC\Two\Parameter;

class JumpIfFalse implements Instruction
{
    public function getParameterCount(): int
    {
        return 2;
    }

    public function execute(Parameter ...$parameters): Order
    {
        if (!$parameters[0]->getValue()) {
            return new MovePointerToLocation($parameters[1]->getValue());
        }

        return new NoOperation();
    }
}
