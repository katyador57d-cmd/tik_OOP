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
            echo "Введите координаты: row-col, 0-2" . "\n";
            $input = trim(fgets(STDIN));

            $coord = explode(" ", $input);
            if (count($coord) !== 2) {
                $this->display->printError("Введите 2 числа!");
                continue;
            }

        $row = (int)$coord[0];
        $col = (int)$coord[1];
        
        if (!$board->isCellEmpty($row, $col)) {
            $this->display->printError("Клетка занята!");
            continue;
        }
        return [$row, $col];
    }
    }
}