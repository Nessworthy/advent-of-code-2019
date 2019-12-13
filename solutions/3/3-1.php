<?php declare(strict_types=1);

use Nessworthy\AOC\FileReader;
use Nessworthy\AOC\Three\Mover;

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


$mover = new Mover();
$mover->registerMovement('U', Mover::Y, Mover::FORWARDS);
$mover->registerMovement('D', Mover::Y, Mover::BACKWARDS);
$mover->registerMovement('R', Mover::X, Mover::FORWARDS);
$mover->registerMovement('L', Mover::X, Mover::BACKWARDS);

$map = [];

$id = 0;

foreach (FileReader::readLineFrom(__DIR__ . '/input.txt') as $path) {
    $movements = explode(',', $path);
    $currentPosition = [0,0];
    foreach ($movements as $movement) {
        $direction = $movement[0];
        $distance = (int) substr($movement, 1);
        $nextPosition = $currentPosition;
        foreach ($mover->move($currentPosition, $direction, $distance) as $nextPosition) {
            $key = $nextPosition[0] . ',' . $nextPosition[1];
            $map[$key] = ($map[$key] ?? 0) | (2 ** $id);
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
        $points[$coords] = array_sum(array_map('abs', explode(',', $coords)));
    }
}

asort($points);
echo array_shift($points);
