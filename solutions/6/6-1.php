<?php declare(strict_types=1);

use Nessworthy\AOC\FileReader;

require_once __DIR__ . '/../../vendor/autoload.php';

$scoreByNode = ['COM' => 0];

$pass = 0;
$doneSomething = true;

while($doneSomething) {
    $doneSomething = false;
    ++$pass;
    echo "PASS " . $pass . "\n";
    foreach (FileReader::readLineFrom(__DIR__ . '/input.txt') as $line) {

        [$from, $to] = explode(')', $line);
        // echo $from . ' -> ' . $to . "\n";

        if (isset($scoreByNode[$to])) {
            continue;
        }
        if (!isset($scoreByNode[$from])) {
            continue;
        }
        echo $from . ' -> ' . $to . ' = ' . $scoreByNode[$from] . "\n";
        $scoreByNode[$to] = $scoreByNode[$from] + 1;
        $doneSomething = true;
    }
}

echo array_sum($scoreByNode);
