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
    return redirect()->route('match.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('team', 'TeamController')->middleware('auth');
Route::resource('schedule', 'ScheduleController')->middleware('auth');
Route::resource('player', 'PlayerController')->middleware('auth');
Route::get('/player_by_team/{id}', 'PlayerController@get_player_by_team')->name('player.json');
Route::get('/match/create/{schedule_id}', 'MatchController@create')->name('match.create')->middleware('auth');
Route::post('/match', 'MatchController@store')->name('match.store')->middleware('auth');

Route::get('/match', 'MatchController@index')->name('match.index');