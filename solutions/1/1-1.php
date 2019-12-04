<?php declare(strict_types=1);

use Nessworthy\AOC\FileReader;
use Nessworthy\AOC\One\FuelCalculator;

require_once __DIR__ . '/../../vendor/autoload.php';

$total = 0;

foreach (FileReader::readLineFrom(__DIR__ . '/input.txt', FileReader::AS_INTEGER) as $cost) {
    $total += FuelCalculator::calculateFuel($cost);
}

echo $total;
