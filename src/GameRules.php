<?php

declare(strict_types=1);

class GameRules 
{

    public function checkLine(array $line): ?string   
    {
        if ($line [0] === $line[1] && $line[1] === $line[2] && $line[0] !== Board::EMPTY_CELL) {
            return $line[0];    
        }
        return null;
    }
    
    public function checkWinner(Board $board): ?string
    {
       
        for ($i = 0; $i < Board::SIZE; $i++) {
            $winner = $this->checkLine($board->getRow($i));
            if ($winner !== null) {
                return $winner;
            }
        }

        for ($i = 0; $i < Board::SIZE; $i++) {
            $winner2 = $this->checkLine($board->getColumn($i));
            if ($winner2 !== null) {
                return $winner2;
            }
        }

        $diag = $board->getDiagonals();
        foreach ($diag as $dia) {
            $winner = $this->checkLine($dia);
            if ($winner !== null) {
                return $winner;
            }
        }
        return null;
    }

    public function isDraw(Board $board): bool
    {
        if ($board->isFull() === true && $this->checkWinner($board) === null) {
            return true;
        }
        return false;
    }
}