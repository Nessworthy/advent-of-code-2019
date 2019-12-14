<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\Order;

use Nessworthy\AOC\Two\Order;
use Nessworthy\AOC\Two\PointerControl;

class MovePointerToLocation implements Order
{
    /**
     * @var int
     */
    private int $location;

    public function __construct(int $location)
    {
        $this->location = $location;
    }

    public function execute(&$program, PointerControl $pointer): void
    {
        $pointer->setDesiredPosition($this->location);
    }
}
