<?php

namespace App\Services;
use App\Models\ChessBoard;
use App\Models\Queen;

class ChessService
{
    public function queensAttack($n, $k, $rq, $cq, $obstacles)
    {
        $chessBoard = new ChessBoard($n);

        foreach ($obstacles as $obstacle) {
            $chessBoard->addObstacle($obstacle[0], $obstacle[1]);
        }

        $queen = new Queen($rq, $cq, $chessBoard);

        return $queen->getAttackableSquares();
    }
}
