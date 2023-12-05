<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\WinLossController;
use App\Http\Controllers\GreedyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FriendListController;
use App\Http\Controllers\blockListController;
use App\Http\Controllers\MessageListController;





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
// friend list 


Route::post('/actions', [GameController::class,'receivedData']);
Route::get('/winloss', [WinLossController::class ,'listOfWinLoss']);
Route::post('/winloss', [WinLossController::class ,'WinLoss']);
//greedy
Route::post('/greedy_actions', [GreedyController::class ,'receivedData']);


//core apis
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/message-lists', [MessageListController::class, 'store']);


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/friend-lists', [FriendListController::class, 'store']);
    Route::post('/block-lists', [blockListController::class, 'store']);
    });