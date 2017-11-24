<?php

declare(strict_types = 1);

namespace Dojo;

final class Position
{
    private $x;
    private $y;

    private function __construct(int $x, int $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public static function create($x, $y)
    {
        return new self($x, $y);
    }

    public static function createWithAdvancedXPos(Position $position, int $modifier)
    {
        return new self($position->x + $modifier, $position->y);
    }

    public static function createWithAdvancedYPos(Position $position, int $modifier)
    {
        return new self($position->x, $position->y + $modifier);
    }

    public function toArray(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
        ];
    }
}

