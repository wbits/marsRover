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

    public static function createWithModifiedXPos(Position $position, callable $modify)
    {
        $newPosition = (($modify($position->x)) % 10);

        return new self($newPosition, $position->y);
    }

    public static function createWithModifiedYPos(Position $position, callable $modify)
    {
        $newPosition = (($modify($position->y)) % 10);

        return new self($position->x, $newPosition);
    }

    public function toArray(): array
    {
        return [
            'x' => $this->x,
            'y' => $this->y,
        ];
    }
}

