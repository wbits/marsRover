<?php

declare(strict_types = 1);

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

    public function isPositionBlocked(Position $position): bool
    {
        return array_key_exists((string) $position, $this->obstacles);
    }
}
