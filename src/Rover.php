<?php

declare(strict_types = 1);

namespace Dojo;

final class Rover
{
    private $xPosition;
    private $yPosition;

    private function __construct(int $xPosition, int $yPosition) {

        $this->xPosition = $xPosition;
        $this->yPosition = $yPosition;
    }

    public static function initializeWithStartingPosition(int $x, int $y) : Rover
    {
        return new self($x, $y);
    }

    public function executeCommand(string $string): array
    {
        return [
            'x' => $this->xPosition,
            'y' => $this->yPosition,
        ];
    }
}

