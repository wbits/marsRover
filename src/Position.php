<?php

declare(strict_types = 1);

namespace Dojo;

final class Position
{
    private $x;
    private $y;
    private $bearing;

    private function __construct(int $x, int $y, Bearing $bearing)
    {
        $this->x = $x;
        $this->y = $y;
        $this->bearing = $bearing;
    }

    public static function create($x, $y, string $bearing)
    {
        return new self($x, $y, Bearing::createWithDirection($bearing));
    }

    public static function moveForward(Position $position)
    {
        $direction = (string) $position->bearing;
        switch ($direction) {
            case 'N':
                return new self($position->x, $position->y + 1, $position->bearing);
            case 'S':
                return new self($position->x, $position->y - 1, $position->bearing);
            case 'E':
                return new self($position->x + 1, $position->y, $position->bearing);
            case 'W':
                return new self($position->x - 1, $position->y, $position->bearing);
        }
    }

    public static function alterBearingCounterClockWise(Position $position): Position
    {
        return new self($position->x, $position->y, Bearing::turnLeft($position->bearing));
    }

    public static function alterBearingClockWise(Position $position): Position
    {
        return new self($position->x, $position->y, Bearing::turnRight($position->bearing));
    }

    public function toArray(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
            'h' => (string) $this->bearing,
        ];
    }
}

