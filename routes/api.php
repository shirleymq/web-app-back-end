<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChessController;
use App\Http\Controllers\StringValueController;

Route::post('/chess/square', [ChessController::class, 'getQueenAttackableSquares']);
Route::post('/string/max-value', [StringValueController::class, 'getMaximunValueFunction']);