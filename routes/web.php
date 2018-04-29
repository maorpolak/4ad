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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/game', 'GamesController@index');
Route::get('/game/{gameId}', 'GamesController@show');
Route::post('/game', 'GamesController@store');
Route::post('/game/{gameId}', 'GamesController@save');
Route::post('/game/logMonsterKill/{gameId}', 'GamesController@logMonsterKill');
Route::get('/game/monsterKilled/{gameId}', 'GamesController@getMonstersKilled');
Route::delete('/game/monsterKilled/{monsterId}', 'GamesController@deleteMonsterKilled');