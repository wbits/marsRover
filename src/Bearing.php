<?php

declare(strict_types = 1);

namespace Dojo;

final class Bearing
{
    private $bearing;

    const DIRECTIONS = [0 => 'N', 1 => 'E', 2 => 'S', 3 => 'W'];

    private function __construct(int $bearing)
    {
        $this->bearing = $bearing;
    }

    public static function createWithDirection(string $direction)
    {
        return new self(array_search($direction, self::DIRECTIONS));
    }

    public static function turnLeft(Bearing $bearing)
    {
        return new self(($bearing->bearing + 3) % 4);
    }

    public static function turnRight(Bearing $bearing)
    {
        return new self(($bearing->bearing + 1) % 4);
    }

    public function __toString(): string
    {
        return self::DIRECTIONS[$this->bearing];
    }
}

