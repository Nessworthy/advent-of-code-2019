<?php declare(strict_types=1);

use Nessworthy\AOC\Five\IntCodeParser;
use Nessworthy\AOC\Five\System\Input;
use Nessworthy\AOC\Five\System\Output;
use Nessworthy\AOC\Seven\PhaseSettingGenerator;

require_once __DIR__ . '/../../vendor/autoload.php';

$psg = new PhaseSettingGenerator();
$generator = $psg->generateCombinations([5,6,7,8,9]);
$highest = 0;

$intCodes = array_map(fn($i) => (int)$i, explode(',', file_get_contents('input.txt')));
$output = new Output();

foreach ($generator as $phaseSettingCombination) {
    $value = 0;

    foreach ($phaseSettingCombination as $phaseSetting) {
        $input = new Input($phaseSetting, $value);
        $program = IntCodeParser::versionThree($input, $output);

        $program->execute($intCodes);

        $value = $output->readOutput();
    }
    echo implode('', $phaseSettingCombination) . ' - ' . $value . "\n";
    if ($highest < $value) {
        $highest = $value;
    }
}

echo 'HIGHEST: ' . $highest . "\n";
