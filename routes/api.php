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

Route::get('/v1/lotter','LottersController@luck28')->middleware("lotter");
Route::get("/v1/query","LottersController@queryLotter");
Route::get("/v1/test","LottersController@test");
Route::get("/v1/getLotters","LottersController@getLotters");
