<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChessControllerTest extends TestCase
{

    public function testGetQueenAttackableSquaresSample0()
    {
        $data = [
             'boardSize' => 4 ,
             'obstaclesNumber' => 0, 
             'rowQueen' => 4, 
             'columnQueen' => 4, 
             'obstacles' => [] 
        ];
        $response = $this->postJson('/api/chess/square', $data);

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => 9,
                 ]);
    }

    public function testGetQueenAttackableSquaresSample1()
    {
        $data = [
             'boardSize' => 5 ,
             'obstaclesNumber' => 3, 
             'rowQueen' => 4, 
             'columnQueen' => 3, 
             'obstacles' => [[5,5],[4,2],[2,3]] 
        ];
        $response = $this->postJson('/api/chess/square', $data);

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => 10,
                 ]);
    }

    public function testGetQueenAttackableSquaresSample3()
    {
        $data = [
             'boardSize' => 1 ,
             'obstaclesNumber' => 0, 
             'rowQueen' => 1, 
             'columnQueen' => 1, 
             'obstacles' => [] 
        ];
        $response = $this->postJson('/api/chess/square', $data);

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => 0,
                 ]);
    }

    public function testBoardSizeValidationWithValueZero()
    {
        $data = [
            'boardSize' => 0 ,
            'obstaclesNumber' => 0, 
            'rowQueen' => 1, 
            'columnQueen' => 1, 
            'obstacles' => [] 
       ];
        $response = $this->postJson('/api/chess/square', $data);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('boardSize');
    }
    public function testBoardSizeValidationWithValueGreaterThan100000()
    {
        $data = [
            'boardSize' => 100001 ,
            'obstaclesNumber' => 0, 
            'rowQueen' => 1, 
            'columnQueen' => 1, 
            'obstacles' => [] 
       ];
        $response = $this->postJson('/api/chess/square', $data);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('boardSize');
    }

    public function testObstaclesNumberValidationWithValueLessZero()
    {
        $data = [
            'boardSize' => 1 ,
            'obstaclesNumber' => -1, 
            'rowQueen' => 1, 
            'columnQueen' => 1, 
            'obstacles' => [] 
       ];
        $response = $this->postJson('/api/chess/square', $data);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('obstaclesNumber');
    }
    public function testObstaclesNumberValidationWithValueGreaterThan100000()
    {
        $data = [
            'boardSize' => 1 ,
            'obstaclesNumber' => 100001, 
            'rowQueen' => 1, 
            'columnQueen' => 1, 
            'obstacles' => [] 
       ];
        $response = $this->postJson('/api/chess/square', $data);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('obstaclesNumber');
    }

}
