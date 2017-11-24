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
        return new self(Position::create($x, $y, $bearing));
    }

    public function executeCommand(string $string): array
    {
        $commandList = str_split($string);
        foreach ($commandList as $command) {
            if ($command == 'l') {
                $this->turnLeft();
            }

            if ($command == 'r') {
                $this->turnRight();
            }
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

