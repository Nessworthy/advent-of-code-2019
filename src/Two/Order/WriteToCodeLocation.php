<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two\Order;

use Nessworthy\AOC\Two\Order;
use Nessworthy\AOC\Two\PointerControl;

class WriteToCodeLocation implements Order
{
    /**
     * @var int
     */
    private int $location;
    /**
     * @var int
     */
    private int $value;

    public function __construct(int $location, int $value)
    {
        $this->location = $location;
        $this->value = $value;
    }

    public function execute(&$program, PointerControl $pointer): void
    {
        $program[$this->location] = $this->value;
    }
}
