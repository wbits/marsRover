<?php

declare(strict_types = 1);

namespace Dojo;

use PHPUnit\Framework\TestCase;

final class ObstacleMapTest extends TestCase
{
    /** @var ObstacleMap */
    private $map;

    protected function setUp()
    {
        $this->map = ObstacleMap::createWithObstacles(Position::create(1,0), Position::create(5, 3));
    }

    public function testItCanBeCreatedWithObstacles()
    {
        self::assertInstanceOf(ObstacleMap::class, $this->map);
    }

    public function testItKnowsIfAPositionIsBlocked()
    {
        self::assertTrue($this->map->isPositionBlocked(Position::create(1,0)));
    }
}

