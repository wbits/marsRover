<?php

declare(strict_types = 1);

namespace Dojo;

final class Rover
{
    private $position;
    private $bearing;

    private function __construct(Position $position, Bearing $bearing) {

        $this->position = $position;
        $this->bearing = $bearing;
    }

    public static function initializeWithStartingPosition(int $x, int $y, string $bearing) : Rover
    {
        return new self(Position::create($x, $y), Bearing::createWithDirection($bearing));
    }

    public function executeCommands(string $string): array
    {
        $commandRunner = new CommandRunner($string);
        $commandRunner->executeOnRover($this);

        return array_merge(
            $this->position->toArray(),
            ['h' => (string) $this->bearing]
        );
    }

    public function moveForward()
    {
        $this->position = $this->bearing->stepForward($this->position);
    }

    public function moveBackward()
    {
        $this->position = $this->bearing->stepBackward($this->position);
    }

    public function turnLeft()
    {
        $this->bearing = Bearing::createWithALeftTurn($this->bearing);
    }

    public function turnRight()
    {
        $this->bearing = Bearing::createWithARightTurn($this->bearing);
    }

    public function perceivedObstacleInPosition(Position $position)
    {
        return false;
    }
}
