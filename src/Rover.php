<?php

declare(strict_types = 1);

namespace Dojo;

final class Rover
{
    private $position;

    private function __construct(Position $position) {

        $this->position = $position;
    }

    public static function initializeWithStartingPosition(int $x, int $y) : Rover
    {
        return new self(new Position($x, $y));
    }

    public function executeCommand(string $string): array
    {
        return $this->position->toArray();
    }
}

