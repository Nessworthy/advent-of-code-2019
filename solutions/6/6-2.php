<?php declare(strict_types=1);

use Nessworthy\AOC\FileReader;

require_once __DIR__ . '/../../vendor/autoload.php';

$pathByNode = ['COM' => []];

$pass = 0;
$doneSomething = true;

while($doneSomething) {
    $doneSomething = false;
    ++$pass;
    echo "PASS " . $pass . "\n";
    foreach (FileReader::readLineFrom(__DIR__ . '/input.txt') as $line) {

        [$from, $to] = explode(')', $line);
        // echo $from . ' -> ' . $to . "\n";

        if (isset($pathByNode[$to])) {
            continue;
        }
        if (!isset($pathByNode[$from])) {
            continue;
        }
        echo $from . ' -> ' . $to . ' = ' . (count($pathByNode[$from]) + 1) . "\n";
        $pathByNode[$to] = $pathByNode[$from];
        $pathByNode[$to][] = $to;
        $doneSomething = true;
    }
}

$path = count(array_diff($pathByNode['YOU'], $pathByNode['SAN'])) + count(array_diff($pathByNode['SAN'], $pathByNode['YOU']));

echo $path - 2;
