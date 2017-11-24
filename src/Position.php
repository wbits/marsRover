<?php

declare(strict_types = 1);

namespace Dojo;

final class Position
{
    private $x;
    private $y;

    const OUTER_LIMIT = 10;

    private function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public static function create($x, $y)
    {
        return new self($x, $y);
    }

    public static function createWithModifiedXPos(Position $position, callable $modify)
    {
        return new self(self::calculateTerrainWrap($modify($position->x)), $position->y);
    }

    public static function createWithModifiedYPos(Position $position, callable $modify)
    {
        return new self($position->x, self::calculateTerrainWrap($modify($position->y)));
    }

    public function toArray(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
        ];
    }

    private static function calculateTerrainWrap(int $position)
    {
        return $position % self::OUTER_LIMIT;
    }
}

