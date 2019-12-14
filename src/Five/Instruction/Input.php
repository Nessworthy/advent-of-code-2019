<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\Instruction;

use Nessworthy\AOC\Two\Instruction;
use Nessworthy\AOC\Two\Order;
use Nessworthy\AOC\Two\Parameter;

class Input implements Instruction
{
    /**
     * @var \Nessworthy\AOC\Five\System\Input
     */
    private \Nessworthy\AOC\Five\System\Input $input;

    public function __construct(\Nessworthy\AOC\Five\System\Input $input)
    {
        $this->input = $input;
    }

    public function getParameterCount(): int
    {
        return 1;
    }

    public function execute(Parameter ...$parameters): Order
    {
        return new Order\WriteToCodeLocation($parameters[0]->getCode(), $this->input->getInput());
    }

}
