<?php declare(strict_types=1);

namespace Nessworthy\AOC\Three;

use Generator;

class Mover
{
    private array $directionAxisMatrix = [];
    private array $directionWayMatrix = [];

    public const X = 0;
    public const Y = 1;

    public const FORWARDS = 1;
    public const BACKWARDS = -1;

    public function registerMovement(string $command, int $axis, int $direction): void
    {
        $this->directionAxisMatrix[$command] = $axis;
        $this->directionWayMatrix[$command] = $direction;
    }

    public function move(array $coordinates, string $command, int $distance): Generator
    {
        $axis = $this->directionAxisMatrix[$command];
        $way = $this->directionWayMatrix[$command];

        $lineStart = $coordinates[$axis];
        $lineEnd = $lineStart + ($distance * $way);

        $increment = 1 * $way;

        for ($lineCurrent = $lineStart + $increment; $lineCurrent !== $lineEnd + $increment; $lineCurrent += $increment) {
            $coordinates[$axis] = $lineCurrent;
            yield $coordinates;
        }
    }
}
