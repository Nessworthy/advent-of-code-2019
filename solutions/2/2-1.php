<?php declare(strict_types=1);

require_once __DIR__ . '/../../vendor/autoload.php';

$bags = array_map(fn($i) => (int)$i, explode(',', file_get_contents('input.txt')));

$noun = 0;
$verb = 0;
$bags[1] = $noun;
$bags[2] = $verb;

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

foreach (bag_generator($bags) as $items) {
    switch ($items[0]) {
        case 1:
            $bags[$items[3]] = $bags[$items[1]] + $bags[$items[2]];
            break;
        case 2:
            $bags[$items[3]] = $bags[$items[1]] * $bags[$items[2]];
            break;
        case 99;
            break 2;
        default:
            throw new RuntimeException('Hit an unexpected int code!');
    }
}

echo $bags[0];
