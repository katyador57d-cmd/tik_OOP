<?php

declare(strict_types=1);

require_once __DIR__ . '/src/Board.php';
require_once __DIR__ . '/src/GameRules.php';
require_once __DIR__ . '/src/Display.php';
require_once __DIR__ . '/src/Player.php';
require_once __DIR__ . '/src/HumanPlayer.php';
require_once __DIR__ . '/src/ComputerPlayer.php';
require_once __DIR__ . '/src/Game.php';

$board = new Board();
$rules = new GameRules();
$display = new Display();
$humanPlayer = new HumanPlayer(Board::SYMBOL_X, $display);
$computerPlayer = new ComputerPlayer(Board::SYMBOL_O);

$game = new Game($board, $rules, $display, $humanPlayer, $computerPlayer);
$game->run();