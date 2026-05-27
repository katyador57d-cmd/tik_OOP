<?php
declare(strict_types=1);

abstract class Player {
    public function __construct(
        public readonly string $symbol,
    )
    {
    }

    abstract public function makeMove(Board $board): array;
}