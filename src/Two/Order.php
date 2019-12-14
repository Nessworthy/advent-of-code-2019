<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two;

interface Order
{
    public function execute(&$program, PointerControl $pointer): void;
}
