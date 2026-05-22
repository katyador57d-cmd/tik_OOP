<?php
declare(strict_types=1);

class Display {
    public function printWelcome(): void
    {
        echo "Консольная игра «Крестики-нолики». Игрок (X) играет против компьютера (O)." . "\n";
        echo "После каждого хода доска перерисовывается." . "\n";
        echo "Игра заканчивается победой одного из игроков или ничьёй." . "\n";
        echo "После окончания партии — программа завершается." . "\n";
    }

    public function printBoard(Board $board): void
    {
        echo " 0  1  2\n";

        $cells = $board->getCells();

        for ($row = 0; $row < Board::SIZE; $row++) {
            echo $row . " ";

            for ($col = 0; $col< Board::SIZE; $col++) {
                echo $cells[$row][$col] . " ";
            }
            echo "\n";
            }

    }

    public function printMoveAnnouncement(string $symbol): void
    {
        echo "Ход игрока: " . $symbol . "\n";
    }
    
    public function printResult(?string $winner): void
    {
        if ($winner === null) {
            echo '-' . "\n";
        } else {
            echo "Победил " . $winner . "!" . "\n";
        }
    }

    public function printError(string $message): void
    {
        echo "Ошибка: " . $message . "\n";
    }
}