<?php

declare(strict_types = 1);

namespace Dojo;

final class Rover
{
    private $position;

    private function __construct(Position $position) {

        $this->position = $position;
    }

    public static function initializeWithStartingPosition(int $x, int $y, string $bearing) : Rover
    {
        return new self(new Position($x, $y, $bearing));
    }

    public function executeCommand(string $string): array
    {
        return $this->position->toArray();
    }
}

