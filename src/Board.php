<?php
declare(strict_types=1);

class Board {
    public const SIZE = 3;
    public const EMPTY_CELL = '.';
    public const SYMBOL_X = 'X';
    public const SYMBOL_O = 'O';
    private array $cells;
    public function __construct()
    {
         $this->cells = [
            [self::EMPTY_CELL, self::EMPTY_CELL, self::EMPTY_CELL],
            [self::EMPTY_CELL, self::EMPTY_CELL, self::EMPTY_CELL],
            [self::EMPTY_CELL, self::EMPTY_CELL, self::EMPTY_CELL],
        ];
    }

    public function makeMove(int $row, int $col, string $symbol): void 
    {
        if ($row < 0 || $row >= self::SIZE || $col <0 || $col >= self::SIZE) {
            throw new InvalidArgumentException("Координаты не в доске");
        }  
        
        if (!$this->isCellEmpty($row, $col)) {
            throw new InvalidArgumentException("Эта клетка не доля использования");
        }

        $this->cells[$row][$col] = $symbol;
    }

    public function isCellEmpty(int $row, int $col): bool
    {
        return $this->cells[$row][$col] === self::EMPTY_CELL;
    }

    public function getEmptyCells(): array  
    {
        $empty = [];
        for ($row = 0; $row < self::SIZE; $row++) {
            for ($col =0; $col < self::SIZE; $col++ ) {
                
                if ($this->isCellEmpty($row, $col)) {
                    $empty[] = [$row, $col];
                }
            }
        } 
        return $empty;
    }

    public function isFull(): bool
    {
        if (empty($this->getEmptyCells())) {
            return true;
        }
        return false;
    }

    public function getCells(): array
    {
        return $this->cells;
    }
    
    public function getRow(int $index): array
    {
       return $this->cells[$index];
    }

    public function getColumn(int $index): array 
    {
        $result = [];

        for ($row = 0; $row < self::SIZE; $row++) {
            $result[] = $this->cells[$row] [$index];
        }
        return $result;
        }


    public function getDiagonals(): array 
    {
        $d1 = [];
        $d2 = [];

        for ($i = 0; $i < self::SIZE; $i++) {
            $d1[] = $this->cells[$i][$i];
            $d2[] = $this->cells[$i][self::SIZE -1 - $i];
        }
        return [$d1, $d2];
    }


}