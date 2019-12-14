<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\Order;

use Nessworthy\AOC\Two\PointerControl;
use Nessworthy\AOC\Two\Order;

class NoOperation implements Order
{
    public function execute(&$program, PointerControl $pointerControl): void {}
}
