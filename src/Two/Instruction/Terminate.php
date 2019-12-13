<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two\Instruction;

use Nessworthy\AOC\Two\Instruction;
use Nessworthy\AOC\Two\Order;
use Nessworthy\AOC\Two\Parameter;

class Terminate implements Instruction
{
    public function getParameterCount(): int
    {
        return 0;
    }

    public function execute(Parameter ...$parameters): Order
    {
        return new Order\TerminateProgram();
    }
}
