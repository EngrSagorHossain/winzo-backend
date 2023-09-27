<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\WinLossController;
use App\Http\Controllers\GreedyController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/actions', [GameController::class,'receivedData']);
Route::get('/winloss', [WinLossController::class ,'listOfWinLoss']);
Route::post('/winloss', [WinLossController::class ,'WinLoss']);
//greedy
Route::post('/greedy_actions', [GreedyController::class ,'receivedData']);

