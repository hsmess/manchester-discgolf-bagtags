<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\ThursdayController;
use App\Http\Controllers\Api\TournamentController;
use App\Http\Resources\UserApi as UserApiResource;
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

Route::middleware('auth:sanctum')->get('/users',function (Request $request){
    return \Response::json(UserApiResource::collection(\App\Models\User::where('paid_2023',true)->get()));
});

Route::post('/user/pay/confirm',[ApiController::class,'confirm']);
Route::post('/user/pay',[ApiController::class,'pay']);

Route::post('/user/thursday/confirm',[ThursdayController::class,'confirm']);
Route::post('/user/thursday',[ThursdayController::class,'pay']);

Route::post('/user/tournament/confirm',[TournamentController::class,'confirm']);
Route::post('/user/tournament',[TournamentController::class,'pay']);



Route::post('/tag/{bagtag}/update',[ApiController::class,'update']);
