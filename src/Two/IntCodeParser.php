<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two;

use Generator;
use Nessworthy\AOC\Two\Instruction\Add;
use Nessworthy\AOC\Two\Instruction\Multiply;
use Nessworthy\AOC\Two\Instruction\Terminate;

/**
 * Class IntCodeParser
 *
 * This class has additional functionality for day 5, but is fully compatible with day 2.
 * @package Nessworthy\AOC\Two
 */
class IntCodeParser
{
    private const MODE_POSITIONAL = 0;
    private const MODE_IMMEDIATE = 1;
    /**
     * @var Instruction[]
     */
    private array $registeredOperations;

    private function createIntCodeGenerator(array &$items): Generator
    {
        $pointer = 0;
        while ($pointer < count($items)) {
            yield $items[$pointer];
            ++$pointer;
        }
    }

    public function registerInstruction(int $instructionId, Instruction $instruction): void
    {
        $this->registeredOperations[$instructionId] = $instruction;
    }

    /**
     * @param int[] $intCodes
     * @return int
     * @throws InstructionNotFoundException
     * @throws WtfParameterModeException
     */
    public function execute(array $intCodes): int
    {
        $intCodeGenerator = $this->createIntCodeGenerator($intCodes);

        foreach ($intCodeGenerator as $commandData) {

            $commandData = new Command($commandData);

            $OPCode = $commandData->getOPCode();

            if (!isset($this->registeredOperations[$OPCode])) {
                throw new InstructionNotFoundException(sprintf('Instruction ID %d found, but not registered.', $OPCode));
            }

            $operation = $this->registeredOperations[$OPCode];

            $parameterCount = $operation->getParameterCount();
            $parameters = $this->readNextCodes($parameterCount, $intCodeGenerator);

            $parameterValues = $this->createOperationParameters($intCodes, $parameters, $commandData);

            $programCommand = $operation->execute(...$parameterValues);

            $programCommand->execute($intCodes);

            if ($programCommand instanceof TerminatingOrder) {
                break;
            }
        }
        return $intCodes[0];
    }

    private function readNextCodes(int $codes, Generator $generator): array
    {
        $return = [];
        for ($current = 0; $current < $codes; ++$current) {
            $generator->next();
            $return[] = $generator->current();
        }
        return $return;
    }

    /**
     * @param array $intCodes
     * @param array $parameters
     * @param Command $commandData
     * @return array
     * @throws WtfParameterModeException
     */
    private function createOperationParameters(array $intCodes, array $parameters, Command $commandData): array
    {
        $parameterValues = [];

        foreach ($parameters as $index => $parameter) {
            // Parameter modes are to do with day 5.
            $parameterMode = $commandData->getParameterMode($index);
            switch ($parameterMode) {
                case self::MODE_IMMEDIATE:
                    $parameterValues[$index] = new Parameter($parameter, $parameter);
                    break;
                case self::MODE_POSITIONAL:
                    $parameterValues[$index] = new Parameter($parameter, $intCodes[$parameter]);
                    break;
                default:
                    throw new WtfParameterModeException('WTF, Unexpected parameter mode: ' . $parameterMode);
                    break;
            }
        }
        return $parameterValues;
    }

    public static function forDayTwo(): IntCodeParser
    {
        $program = new self();
        $program->registerInstruction(1, new Add());
        $program->registerInstruction(2, new Multiply());
        $program->registerInstruction(99, new Terminate());
        return $program;
    }
}
