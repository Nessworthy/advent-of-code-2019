<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\System;

class Input
{
    /**
     * @var int[]
     */
    private array $inputs;

    public function __construct(int ...$inputs)
    {
        $this->inputs = $inputs;
    }

    public function getInput(): int
    {
        return array_shift($this->inputs);
    }
}
