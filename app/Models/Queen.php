<?php

namespace App\Models;

class Queen
{
    private $row;
    private $col;
    private $chessBoard;

    public function __construct($row, $col, ChessBoard $chessBoard)
    {
        $this->row = $row;
        $this->col = $col;
        $this->chessBoard = $chessBoard;
    }

    public function getAttackableSquares()
    {
        $directions = [
            [1, 0], [-1, 0], [0, 1], [0, -1], 
            [1, 1], [1, -1], [-1, 1], [-1, -1]
        ];

        $attackableSquares = 0;

        foreach ($directions as $direction) {
            $attackableSquares += $this->countAttackableSquaresInDirection($direction[0], $direction[1]);
        }

        return $attackableSquares;
    }

    private function countAttackableSquaresInDirection($rowIncrement, $colIncrement)
    {
        $currentRow = $this->row;
        $currentCol = $this->col;
        $count = 0;

        while (true) {
            $currentRow += $rowIncrement;
            $currentCol += $colIncrement;

            if ($this->chessBoard->isOutOfBounds($currentRow, $currentCol) || $this->chessBoard->isObstacle($currentRow, $currentCol)) {
                break;
            }

            $count++;
        }

        return $count;
    }
}