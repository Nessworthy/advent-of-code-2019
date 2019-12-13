<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two;

class Command
{
    /**
     * @var int
     */
    private int $OPCode;

    /**
     * @var int
     */
    private $instructionId;

    /**
     * @var int
     */
    private $modes;

    public function __construct(int $OPCode)
    {
        $this->OPCode = $OPCode;
        $this->instructionId = $OPCode % 100;
        $this->modes = bindec($OPCode === 0 ? '0' : (string) floor($OPCode / 100));
    }

    public function getOPCode(): int
    {
        return $this->instructionId;
    }

    public function getParameterMode(int $parameter): int
    {
        return (2 ** $parameter) & $this->modes;
    }
}
