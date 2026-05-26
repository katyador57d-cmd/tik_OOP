<?php

declare(strict_types=1);

class HumanPlayer extends Player {
    
    public function __construct(
        string $symbol,
        private readonly Display $display
    )
    {
        parent::__construct($symbol);
    }

    public function makeMove(Board $board): array
    {
        while (true) {
            echo "Введите координаты (row col, 0-2): ";
            $input = trim(fgets(STDIN));
            
            $coords = explode(" ", $input);
            if (count($coords) !== 2) {
                $this->display->printError("Введите два числа!");
                continue;
            }
            
            $row = (int)$coords[0];
            $col = (int)$coords[1];
            
            if (!$board->isCellEmpty($row, $col)) {
                $this->display->printError("Клетка занята!");
                continue;
            }
            
            return [$row, $col];
        }
    }
}