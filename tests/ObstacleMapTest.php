<?php

declare(strict_types = 1);

namespace Dojo;

use PHPUnit\Framework\TestCase;

final class ObstacleMapTest extends TestCase
{
    public function testItCanBeCreatedWithObstacles()
    {
        $map = ObstacleMap::createWithObstacles(Position::create(1,0), Position::create(5, 3));

        self::assertInstanceOf(ObstacleMap::class, $map);
    }
}

