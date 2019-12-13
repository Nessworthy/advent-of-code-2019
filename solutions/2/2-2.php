<?php declare(strict_types=1);

use Nessworthy\AOC\Two\IntCodeParser;

require_once __DIR__ . '/../../vendor/autoload.php';

function answer($noun, $verb) {
    echo 100 * $noun + $verb;
}

function convert_to_noun_and_verb(int $number) {
    return $number === 0 ? [0, 0] : [floor($number / 99), $number % 99];
}

$bags = array_map(fn($i) => (int)$i, explode(',', file_get_contents('input.txt')));
$noun = 0;
$verb = 0;
$target = 19690720;

$min = 0;
$max = 99 * 99;

$found = false;

echo 'Min - Max (Current) = (Noun/Verb) = Result' . "\n";

$program = new IntCodeParser();

while (!$found) {
    $current = $min + (int) floor(($max - $min) / 2);
    [$noun, $verb] = convert_to_noun_and_verb($current);

    $bagsCopy = $bags;
    $bagsCopy[1] = (int) $noun;
    $bagsCopy[2] = (int) $verb;
    $value = $program->execute($bagsCopy);

    echo sprintf('%s - %s (%s) = (%s/%s) = %s', $min, $max, $current, $noun, $verb, $value) . "\n";

    if ($value === $target) {
        $found = true;
    } elseif ($value < $target) {
        $min = max($current, $min + 1);
    } else {
        $max = min($current, $max - 1);
    }
}

answer($noun, $verb);
