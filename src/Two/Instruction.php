<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two;

interface Instruction
{
    public function getParameterCount(): int;
    public function execute(Parameter ...$parameters): Order;
}
