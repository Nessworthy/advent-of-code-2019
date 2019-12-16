<?php declare(strict_types=1);

use Nessworthy\AOC\Five\IntCodeParser;
use Nessworthy\AOC\Five\System\Input;
use Nessworthy\AOC\Five\System\Output;

require_once __DIR__ . '/../../vendor/autoload.php';


$promise = [];
$highest = 0;

foreach ($promise as $phaseSettingCombination) {
    $value = 0;
    foreach ($phaseSettingCombination as $phaseSetting) {
        $input = new Input([$phaseSetting, $value]);
        $output = new Output();
        $program = IntCodeParser::versionThree($input, $output);

        $program->execute($intCodes);

        $value = $output->readOutput();
    }
    if ($highest < $value) {
        $value = $highest;
    }
}

echo $value;
