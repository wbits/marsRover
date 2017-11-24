<?php

declare(strict_types = 1);

namespace Dojo;

use PHPUnit\Framework\TestCase;

final class RoverTest extends TestCase
{
    /** @var Rover */
    private $rover;

    protected function setUp()
    {
        $obstacleMap = ObstacleMap::createWithObstacles(Position::create(4,0));
        $this->rover = Rover::initializeWithStartingPositionAndObstacleMap(0,0, 'N', $obstacleMap);
    }

    public function testItGetsInitializedWithStartingPositionAndBearing()
    {
        self::assertEquals(['x' => 0, 'y' => 0, 'h' => 'N'], $this->rover->executeCommands(''));
    }

    public function testItCanTurnLeft()
    {
        self::assertEquals(['x' => 0, 'y' => 0, 'h' => 'W'], $this->rover->executeCommands('l'));
    }

    public function testItCanTurnRight()
    {
        self::assertEquals(['x' => 0, 'y' => 0, 'h' => 'E'], $this->rover->executeCommands('r'));
    }

    public function testICanTurnTwice()
    {
        self::assertEquals(['x' => 0, 'y' => 0, 'h' => 'S'], $this->rover->executeCommands('ll'));
    }

    public function testItCanMoveForward()
    {
        self::assertEquals(['x' => 0, 'y' => 1, 'h' => 'N'], $this->rover->executeCommands('f'));
    }

    public function testItCanTurnAndMoveForward()
    {
        self::assertEquals(['x' => 1, 'y' => 0, 'h' => 'E'], $this->rover->executeCommands('rf'));
    }

    public function testItCanMoveBackwards()
    {
        self::assertEquals(['x' => 0, 'y' => -1, 'h' => 'N'], $this->rover->executeCommands('b'));
    }

    public function testItMovesOnAWrappedGrid()
    {
        self::assertEquals(['x' => 0, 'y' => 1, 'h' => 'N'], $this->rover->executeCommands('fffffffffff'));
    }

    public function testItMovesOnAWrappedGridOnHorizontalAxis()
    {
        self::assertEquals(['x' => -1, 'y' => 0, 'h' => 'W'], $this->rover->executeCommands('lfffffffffff'));
    }

    public function testItReturnsFalseIfItDoesNotPerceiveAnyObstacles()
    {
        self::assertFalse($this->rover->perceivedObstacleInPosition(Position::create(0, 1)));
    }

    public function testItReturnsTrueIfItDoesPerceiveAnObstacle()
    {
        self::assertTrue($this->rover->perceivedObstacleInPosition(Position::create(4, 0)));
    }
}

