<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\Instruction;

use Nessworthy\AOC\Five\Order\NoOperation;
use Nessworthy\AOC\Two\Instruction;
use Nessworthy\AOC\Two\Order;
use Nessworthy\AOC\Two\Parameter;

class Output implements Instruction
{
    /**
     * @var \Nessworthy\AOC\Five\System\Output
     */
    private \Nessworthy\AOC\Five\System\Output $output;

    public function __construct(\Nessworthy\AOC\Five\System\Output $output)
    {
        $this->output = $output;
    }

    public function getParameterCount(): int
    {
        return 1;
    }

    public function execute(Parameter ...$parameters): Order
    {
        $this->output->sendOutput($parameters[0]->getValue());
        return new NoOperation();
    }

}
