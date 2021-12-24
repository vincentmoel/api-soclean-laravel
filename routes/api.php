<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout']);

Route::group(['middleware' => ['auth:api']], function () {

    Route::get('/user',[UserController::class,'index']);
    Route::get('/transaction',[TransactionController::class,'index']);
    Route::post('/transaction',[TransactionController::class,'store']);
    Route::put('/transaction/{transaction}',[TransactionController::class,'update']);
    
});

Route::get('/transaction/{transaction}',[TransactionController::class,'show']);