<?php declare(strict_types=1);

use Nessworthy\AOC\Five\IntCodeParser;
use Nessworthy\AOC\Five\System\Input;
use Nessworthy\AOC\Five\System\Output;

require_once __DIR__ . '/../../vendor/autoload.php';

$intCodes = array_map(fn($i) => (int)$i, explode(',', file_get_contents('input.txt')));

$input = new Input(5);
$output = new Output();

$machine = IntCodeParser::forDayFivePartTwo($input, $output);
$machine->execute($intCodes);

echo 'DIAGNOSTICS COMPLETE' . "\n";
