<?php declare(strict_types=1);

use Nessworthy\AOC\FileReader;
use Nessworthy\AOC\Four\IncrementingDigitNumberGenerator;

require_once __DIR__ . '/../../vendor/autoload.php';

$inputs = FileReader::readLineFrom('input.txt', FileReader::AS_INTEGER);

$minimum = $inputs->current();
$inputs->next();
$maximum = $inputs->current();

$minimum = 307237;
$maximum = 769058;

$generator = new IncrementingDigitNumberGenerator();

$total = 0;

function checkForMatchingDigits(array $digits): bool {
    return in_array(2, $digits, true);
}

foreach ($generator->generateForFourOne($minimum, $maximum, 'checkForMatchingDigits') as $number) {
    ++$total;
    echo str_pad((string) $number, 8, ' ') . ' = ' . $total . "\n";
}

echo $total;
