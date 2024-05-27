<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\ChessService;

class ChessServiceTest extends TestCase
{
    public function testQueensAttackSample0()
    {
        $service = new ChessService();
        $boardSize = 4;
        $obstaclesNumber = 0;
        $rowQueen = 4;
        $columnQueen = 4;
        $obstacles = [];
        $result = $service->queensAttack($boardSize, $obstaclesNumber, $rowQueen, $columnQueen, $obstacles);

        $this->assertEquals(9, $result);
    }

    public function testQueensAttackSample1()
    {
        $service = new ChessService();
        $boardSize = 5;
        $obstaclesNumber = 3;
        $rowQueen = 4;
        $columnQueen = 3;
        $obstacles = [[5,5],[4,2],[2,3]];
        $result = $service->queensAttack($boardSize, $obstaclesNumber, $rowQueen, $columnQueen, $obstacles);

        $this->assertEquals(10, $result);
    }

    public function testQueensAttackSample2()
    {
        $service = new ChessService();
        $boardSize = 1;
        $obstaclesNumber = 0;
        $rowQueen = 1;
        $columnQueen = 1;
        $obstacles = [];
        $result = $service->queensAttack($boardSize, $obstaclesNumber, $rowQueen, $columnQueen, $obstacles);

        $this->assertEquals(0, $result);
    }
}
