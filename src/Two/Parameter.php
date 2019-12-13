<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two;

class Parameter
{
    /**
     * @var int
     */
    private int $code;
    /**
     * @var int
     */
    private int $value;

    public function __construct(int $code, int $value)
    {
        $this->code = $code;
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }

}
