<?php

declare(strict_types=1);

class ComputerPlayer extends Player {
    public function __construct(string $symbol)
    {
        parent::__construct($symbol);
    }

    public function makeMove(Board $board): array
    {
        $emptyCells = $board->getEmptyCells();
        $randomIndex = array_rand($emptyCells);
        return $emptyCells[$randomIndex];

    }
}