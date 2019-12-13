<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two\Order;

use Nessworthy\AOC\Two\TerminatingOrder;

class TerminateProgram implements TerminatingOrder
{
    public function execute(&$program): void {}
}
