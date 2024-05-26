<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChessService;

class ChessController extends Controller
{
    protected $chessService;


    public function __construct(ChessService $chessService)
    {
        $this->chessService = $chessService;
    }

    public function getQueenAttackableSquares(Request $request)
    {
        $data = $request->validate([
            'boardSize' => 'required|integer|min:1|max:100000',
            'obstaclesNumber' => 'required|integer|min:0|max:100000',
            'rowQueen' => 'required|integer|min:1|max:100000',
            'columnQueen' => 'required|integer|min:1|max:100000',
            'obstacles' => 'array'
        ]);

        $n = $data['boardSize'];
        $k = $data['obstaclesNumber'];
        $rq = $data['rowQueen'];
        $cq = $data['columnQueen'];
        $obstacles = $data['obstacles'];

        $result = $this->chessService->queensAttack($n, $k, $rq, $cq, $obstacles);

        return response()->json(['data' => $result]);
    }
}
