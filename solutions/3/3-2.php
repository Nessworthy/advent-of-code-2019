<?php declare(strict_types=1);

use Nessworthy\AOC\FileReader;

require_once __DIR__ . '/../../vendor/autoload.php';

$directionAxisMatrix = [
    'R' => 0,
    'L' => 0,
    'U' => 1,
    'D' => 1,
];

$directionWayMatrix = [
    'R' => -1
];


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

$mover = new Mover();
$mover->registerMovement('U', Mover::Y, Mover::FORWARDS);
$mover->registerMovement('D', Mover::Y, Mover::BACKWARDS);
$mover->registerMovement('R', Mover::X, Mover::FORWARDS);
$mover->registerMovement('L', Mover::X, Mover::BACKWARDS);

$map = [];
$track = [];
$id = 0;

foreach (FileReader::readLineFrom(__DIR__ . '/input.txt') as $path) {
    $movements = explode(',', $path);
    $currentPosition = [0,0];
    $steps = 0;
    foreach ($movements as $movement) {
        $direction = $movement[0];
        $distance = (int) substr($movement, 1);
        $nextPosition = $currentPosition;
        foreach ($mover->move($currentPosition, $direction, $distance) as $nextPosition) {
            $steps += 1;
            $key = $nextPosition[0] . ',' . $nextPosition[1];
            $trackKey = $key . '_' . $id;
            $map[$key] = ($map[$key] ?? 0) | (2 ** $id);
            if (!isset($track[$trackKey])) {
                $track[$trackKey] = $steps;
            }
        }
        $currentPosition = $nextPosition;
    }
    ++$id;
}

arsort($map);

$target = ($id**2)-1;
$points = [];

foreach ($map as $coords => $history) {
    if ($history === $target) {
        $points[$coords] = $track[$coords . '_' . 0] + $track[$coords . '_' . 1];
    }
}

asort($points);
echo array_shift($points);
