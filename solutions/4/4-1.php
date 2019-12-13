<?php declare(strict_types=1);

use Nessworthy\AOC\FileReader;
use Nessworthy\AOC\Four\IncrementingDigitNumberGenerator;

require_once __DIR__ . '/../../vendor/autoload.php';

$inputs = FileReader::readLineFrom('input.txt', FileReader::AS_INTEGER);

$minimum = $inputs->current();
$inputs->next();
$maximum = $inputs->current();

$digitCount = strlen((string)$maximum);

$generator = new IncrementingDigitNumberGenerator();

$total = 0;

foreach (
    $generator->generateForFourOne(
        $minimum,
        $maximum,
        static function (array $digits) use ($digitCount): bool {
            return count(array_flip($digits)) !== $digitCount; // LAZY AF.
        }
    ) as $number
) {
    ++$total;
    echo str_pad((string) $number, 8, ' ') . ' = ' . $total . "\n";
}

echo $total;
