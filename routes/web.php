<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// }); 

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'IndexController@home')->name('test');


Route::get('/getVerify', 'IndexController@getVerify')->name('getVerify');
Route::get('/logout', 'Auth\LoginController@Logout')->name('login');


Route::group(['middleware' => ['auth']], function(){
	Route::get('/game', 'IndexController@index')->name('test');
	Route::get('/game/bet/yw28', 'Game\BettingController@Yw28')->name('test')->middleware("betting");
	Route::get('/game/zoushi/{game_id}', 'Game\LottersController@ZouShi')->name('test');
});

Route::get("/geetest", "IndexController@geetestView");