<?php declare(strict_types=1);

use Nessworthy\AOC\LineReader;
use Nessworthy\AOC\One\FuelCalculator;

require_once __DIR__ . '/../../vendor/autoload.php';

$total = 0;

foreach (LineReader::readLineFrom(__DIR__ . '/input.txt', LineReader::AS_INTEGER) as $cost) {
    $total += FuelCalculator::calculateFuel($cost);
}

echo $total;
