<?php

declare(strict_types=1);

class Game 
{
    public function __construct(
        private readonly Board $board,
        private readonly GameRules $rules,
        private readonly Display $display,
        private readonly Player $humanPlayer,
        private readonly Player $computerPlayer
     ) {
    }

    public function run(): void
    {
        $this->display->printWelcome();

        while (!$this->isGameOver()) {
            $this->playTurn($this->humanPlayer);
            if ($this->isGameOver()) break;

            $this->playTurn($this->computerPlayer);
        }

        $winner = $this->rules->checkWinner($this->board);
        $this->display->printResult($winner);
    }
    
    public function playTurn(Player $player): void
    {
        $this->display->printMoveAnnouncement($player->symbol);
        $move = $player->makeMove($this->board);
        $this->board->makeMove($move[0], $move[1], $player->symbol);
        $this->display->printBoard($this->board);
    }

    private function isGameOver(): bool
    {
        if ($this->rules->checkWinner($this->board) !== null || $this->rules->isDraw($this->board) === true) 
        {
            return true;
        }   
        return false;
    }
}