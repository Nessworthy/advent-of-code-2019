<?php declare(strict_types=1);

use Nessworthy\AOC\Two\IntCodeParser;

require_once __DIR__ . '/../../vendor/autoload.php';

$intCodes = array_map(fn($i) => (int)$i, explode(',', file_get_contents('input.txt')));

$noun = 12;
$verb = 2;

$intCodes[1] = $noun;
$intCodes[2] = $verb;

$machine = IntCodeParser::versionOne();
$output = $machine->execute($intCodes);

echo $output;
