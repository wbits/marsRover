<?php

declare(strict_types = 1);

namespace Dojo;

final class Position
{
    private $x;
    private $y;
    private $bearing;

    public function __construct(int $x, int $y, string $bearing)
    {
        $this->x = $x;
        $this->y = $y;
        $this->bearing = $bearing;
    }

    public static function alterBearingCounterClockWise(Position $position): Position
    {
        return new self($position->x, $position->y, 'W');
    }

    public static function alterBearingClockWise(Position $position): Position
    {
        return new self($position->x, $position->y, 'E');
    }

    public function toArray(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
            'h' => $this->bearing,
        ];
    }
}

