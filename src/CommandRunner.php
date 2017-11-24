<?php

declare(strict_types = 1);

namespace Dojo;

final class CommandRunner
{
    private $commands;

    public function __construct(string $commands)
    {
        $this->commands = str_split($commands);
    }

    public function executeOnRover(Rover $rover)
    {
        foreach ($this->commands as $command) {
            $this->executeSingleCommandOnRover($rover, $command);
        }
    }

    private function executeSingleCommandOnRover(Rover $rover, string $command)
    {
        switch ($command) {
            case 'f':
                $rover->moveForward();
                break;
            case 'l':
                $rover->turnLeft();
                break;
            case 'r':
                $rover->turnRight();
        }
    }
}

