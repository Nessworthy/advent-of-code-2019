<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five\System;

class Output
{
    /**
     * @param int $output
     */
    public function sendOutput(int $output): void
    {
        echo 'OUTPUT: ' . $output . "\n";
    }
}
