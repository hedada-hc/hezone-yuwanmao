<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/lotter','Game\LottersController@luck28')->middleware("lotter");
Route::get("/v1/query","Game\LottersController@queryLotter")->middleware("lotter");
Route::get("/v1/test","Game\LottersController@test");
Route::get("/v1/getLotters","Game\LottersController@getLotters");
Route::get("/v1/lottertime","Game\LottersController@lotterTime");
Route::get("/v1/page","Game\LottersController@Page");
Route::get("/v1/queryzs/{game_id}","Game\LottersController@queryZouShi");
Route::post("/v1/bet","Game\BettingController@addBetting");
Route::get("/v1/bet", "Game\BettingController@getBetting");
Route::get("/v1/betInfo/{betType}", "Game\BettingController@BetInfo");
//queryZouShi
