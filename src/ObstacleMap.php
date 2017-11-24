<?php

declare(strict_types=1);

namespace Dojo;

final class ObstacleMap
{
    private $obstacles;

    private function __construct(array $obstacles)
    {
        $this->obstacles = $obstacles;
    }

    public static function createWithObstacles(Position ...$positions): ObstacleMap
    {
        $obstacles = [];
        foreach ($positions as $position) {
            $obstacles[(string) $position] = $position;
        }

        return new self($obstacles);
    }
}

