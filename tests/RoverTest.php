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
        $this->rover = Rover::initializeWithStartingPosition(0,0, 'N');
    }

    public function testItGetsInitializedWithStartingPositionAndBearing()
    {
        self::assertEquals(['x' => 0, 'y' => 0, 'h' => 'N'], $this->rover->executeCommand(''));
    }

    public function testItCanTurnLeft()
    {
        self::assertEquals(['x' => 0, 'y' => 0, 'h' => 'W'], $this->rover->executeCommand('l'));
    }

    public function testItCanTurnRight()
    {
        self::assertEquals(['x' => 0, 'y' => 0, 'h' => 'E'], $this->rover->executeCommand('r'));
    }

    public function testICanTurnTwice()
    {
        self::assertEquals(['x' => 0, 'y' => 0, 'h' => 'S'], $this->rover->executeCommand('ll'));
    }
}

