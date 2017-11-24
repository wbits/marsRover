<?php

declare(strict_types = 1);

namespace Dojo;

use PHPUnit\Framework\TestCase;

final class RoverTest extends TestCase
{
    public function testItGetsInitializedWithStartingPositionAndBearing()
    {
        $rover = Rover::initializeWithStartingPosition(0,0, 'N');

        self::assertEquals(['x' => 0, 'y' => 0, 'h' => 'N'], $rover->executeCommand(''));
    }
}

