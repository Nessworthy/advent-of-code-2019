<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two\Order;

use Nessworthy\AOC\Two\TerminatingOrder;
use Nessworthy\AOC\Two\PointerControl;

class TerminateProgram implements TerminatingOrder
{
    public function execute(&$program, PointerControl $pointer): void {}
}
