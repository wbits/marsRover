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

    public function executeCommands(string $string): array
    {
        $commandRunner = new CommandRunner($string);
        $commandRunner->executeOnRover($this);

        return $this->position->toArray();
    }

    public function moveForward()
    {
        $this->position = Position::moveForward($this->position);
    }

    public function turnLeft()
    {
        $this->position = Position::alterBearingCounterClockWise($this->position);
    }

    public function turnRight()
    {
        $this->position = Position::alterBearingClockWise($this->position);
    }
}

