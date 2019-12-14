<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\System;

class Input
{
    /**
     * @var int
     */
    private int $input;

    public function __construct(int $input)
    {
        $this->input = $input;
    }

    public function getInput(): int
    {
        return $this->input;
    }
}
