<?php declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

function bag_generator(array &$items)
{
    $pointer = 0;
    while ($pointer < count($items)) {
        yield [
            $items[$pointer],
            $items[$pointer + 1],
            $items[$pointer + 2],
            $items[$pointer + 3]
        ];
        $pointer += 4;
    }
}

function run_program($bag, $noun, $verb): int
{
    $bag[1] = $noun;
    $bag[2] = $verb;

    foreach (bag_generator($bag) as $items) {
        switch ($items[0]) {
            case 1:
                $bag[$items[3]] = $bag[$items[1]] + $bag[$items[2]];
                break;
            case 2:
                $bag[$items[3]] = $bag[$items[1]] * $bag[$items[2]];
                break;
            case 99;
                break 2;
            default:
                throw new RuntimeException('Hit an unexpected int code!');
        }
    }

    return (int) $bag[0];
}

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

while (!$found) {
    $current = $min + (int) floor(($max - $min) / 2);
    [$noun, $verb] = convert_to_noun_and_verb($current);
    $value = run_program($bags, $noun, $verb);

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
