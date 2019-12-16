<?php declare(strict_types=1);

namespace Nessworthy\AOC\Five;

use Nessworthy\AOC\Five\System\Input;
use Nessworthy\AOC\Five\System\Output;

class IntCodeParser extends \Nessworthy\AOC\Two\IntCodeParser
{
    /**
     * Day 5 pt 1
     * @param Input $input
     * @param Output $output
     * @return \Nessworthy\AOC\Two\IntCodeParser
     */
    public static function versionTwo(Input $input, Output $output): \Nessworthy\AOC\Two\IntCodeParser
    {
        $program = self::versionOne();
        $program->registerInstruction(3, new Instruction\Input($input));
        $program->registerInstruction(4, new Instruction\Output($output));
        return $program;
    }

    /**
     * Day 5 pt 2 + Day 7 pt 1
     * @param Input $input
     * @param Output $output
     * @return \Nessworthy\AOC\Two\IntCodeParser
     */
    public static function versionThree(Input $input, Output $output): \Nessworthy\AOC\Two\IntCodeParser
    {
        $program = self::versionTwo($input, $output);
        $program->registerInstruction(5, new Instruction\JumpIfTrue);
        $program->registerInstruction(6, new Instruction\JumpIfFalse);
        $program->registerInstruction(7, new Instruction\LessThan);
        $program->registerInstruction(8, new Instruction\Equals);
        return $program;
    }
}
