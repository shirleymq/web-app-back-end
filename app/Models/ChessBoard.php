<?php

namespace App\Models;

class ChessBoard
{
    private $size;
    private $obstacles;

    public function __construct($size)
    {
        $this->size = $size;
        $this->obstacles = [];
    }

    public function addObstacle($row, $col)
    {
        $this->obstacles[$row][$col] = true;
    }

    public function isObstacle($row, $col)
    {
        return isset($this->obstacles[$row][$col]);
    }

    public function isOutOfBounds($row, $col)
    {
        return $row < 1 || $row > $this->size || $col < 1 || $col > $this->size;
    }
}
