<?php

declare(strict_types = 1);

namespace Dojo;

use PHPUnit\Framework\TestCase;

final class RoverTest extends TestCase
{
    public function testItHasAStartingPosition()
    {
        $rover = Rover::initializeWithStartingPosition(0,0);

        self::assertEquals(['x' => 0, 'y' => 0], $rover->executeCommand(''));
    }
}

