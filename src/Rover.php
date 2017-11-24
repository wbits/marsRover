<?php

declare(strict_types = 1);

namespace Dojo;

final class Rover
{
    private $position;

    private function __construct(Position $position) {

        $this->position = $position;
    }

    public static function initializeWithStartingPosition(int $x, int $y, string $bearing) : Rover
    {
        return new self(new Position($x, $y, $bearing));
    }

    public function executeCommand(string $string): array
    {
        if ($string == 'l') {
            $this->turnLeft();
        }

        if ($string == 'r') {
            $this->turnRight();
        }

        return $this->position->toArray();
    }

    private function turnLeft()
    {
        $this->position = Position::alterBearingCounterClockWise($this->position);
    }

    private function turnRight()
    {
        $this->position = Position::alterBearingClockWise($this->position);
    }
}

