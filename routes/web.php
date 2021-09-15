<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'RoomController@detail');

Route::get('/token/{nama}', ['as' => 'token', 'uses' => 'MidtransController@getSnapToken']);

Route::get('/vote/{id}', 'RoomController@vote');

/*Route::get('/room', 'RoomController@room');

Route::get('/{id}', 'RoomController@detail');*/
