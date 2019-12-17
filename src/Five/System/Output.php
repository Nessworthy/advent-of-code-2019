<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\System;

class Output
{
    /**
     * @var int
     */
    private int $output;

    /**
     * @param int $output
     */
    public function sendOutput(int $output): void
    {
        $this->output = $output;
    }

    /**
     * @return int
     */
    public function readOutput(): int
    {
        return $this->output;
    }
}
