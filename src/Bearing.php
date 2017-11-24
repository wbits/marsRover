<?php

declare(strict_types = 1);

namespace Dojo;

final class Bearing
{
    const NORTH = 0;
    const EAST = 1;
    const SOUTH = 2;
    const WEST = 3;
    const DIRECTIONS = [self::NORTH => 'N', self::EAST => 'E', self::SOUTH => 'S', self::WEST => 'W'];

    private $bearing;
    private $step;

    private function __construct(int $bearing)
    {
        $this->bearing = $bearing;
        $this->step = in_array((string) $bearing, [self::SOUTH, self::WEST]) ? -1 : 1;
    }

    public static function createWithDirection(string $direction): Bearing
    {
        return new self(array_search($direction, self::DIRECTIONS));
    }

    public static function createWithALeftTurn(Bearing $bearing): Bearing
    {
        return new self(($bearing->bearing + 3) % 4);
    }

    public static function createWithARightTurn(Bearing $bearing): Bearing
    {
        return new self(($bearing->bearing + 1) % 4);
    }

    public function stepForward(Position $position): Position
    {
        return $this->move($position, 1);
    }

    public function stepBackward(Position $position): Position
    {
        return $this->move($position, -1);
    }

    public function __toString(): string
    {
        return self::DIRECTIONS[$this->bearing];
    }

    private function move(Position $position, int $modifier): Position
    {
        $modify = function (int $number) use ($modifier) {
            return $number + ($this->step * $modifier);
        };

        switch ($this->bearing) {
            case self::NORTH:
            case self::SOUTH:
                return Position::createWithModifiedYPos($position, $modify);
            case self::EAST:
            case self::WEST:
                return Position::createWithModifiedXPos($position, $modify);
        }
    }
}

