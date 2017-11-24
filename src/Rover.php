<?php

declare(strict_types = 1);

namespace Dojo;

final class Rover
{
    private $position;
    private $bearing;
    private $map;

    private function __construct(Position $position, Bearing $bearing, ObstacleMap $map) {

        $this->position = $position;
        $this->bearing = $bearing;
        $this->map = $map;
    }

    public static function initializeWithStartingPositionAndObstacleMap(int $x, int $y, string $bearing, ObstacleMap $map) : Rover
    {
        return new self(Position::create($x, $y), Bearing::createWithDirection($bearing), $map);
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
        $newPosition = $this->bearing->stepForward($this->position);
        if ($this->perceivedObstacleInPosition($newPosition)) {
            throw new RouteBlockedByObstacleException();
        }

        $this->position = $newPosition;
    }

    public function moveBackward()
    {
        $newPosition = $this->bearing->stepBackward($this->position);
        if ($this->perceivedObstacleInPosition($newPosition)) {
            throw new RouteBlockedByObstacleException();
        }

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

    public function perceivedObstacleInPosition(Position $position): bool
    {
        return $this->map->isPositionBlocked($position);
    }
}
