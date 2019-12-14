<?php declare(strict_types=1);

namespace Nessworthy\AOC\Two;

class PointerControl
{
    private int $position;
    private int $desiredPosition;

    public function __construct(int $position = 0)
    {
        $this->position = $position;
        $this->desiredPosition = $position + 1;
    }

    public function setDesiredPosition(int $position): void
    {
        $this->desiredPosition = $position;
    }

    public function getPosition(): int
    {
        return $this->position;
    }

    public function nextPosition(): int
    {
        $this->position = $this->desiredPosition;
        ++$this->desiredPosition;
        return $this->position;
    }
}
