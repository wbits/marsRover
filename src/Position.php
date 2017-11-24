<?php

declare(strict_types = 1);

namespace Dojo;

final class Position
{
    private $x;
    private $y;
    private $bearing;

    private function __construct(int $x, int $y, int $bearing)
    {
        $this->x = $x;
        $this->y = $y;
        $this->bearing = $bearing;
    }

    public static function create($x, $y, string $bearing)
    {
        return new self($x, $y, array_search($bearing, self::$bearings));
    }

    public static function alterBearingCounterClockWise(Position $position): Position
    {
        return new self($position->x, $position->y, ($position->bearing + 3) % 4);
    }

    public static function alterBearingClockWise(Position $position): Position
    {
        return new self($position->x, $position->y, ($position->bearing + 1) % 4);
    }

    public function toArray(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
            'h' => self::$bearings[$this->bearing],
        ];
    }

    private static $bearings = [
        0 => 'N',
        1 => 'E',
        2 => 'S',
        3 => 'W',
    ];
}

