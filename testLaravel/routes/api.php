<?php

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

Route::get('/test', 'App\Http\Controllers\UsersController@index');

Route::get('/Unites/{element}/{rarity}', 'App\Http\Controllers\UnitesController@getByRarity');

Route::post('/UserUnite', 'App\Http\Controllers\UserUniteController@createUserUnite');

Route::get('/getUnite/{user_id}', 'App\Http\Controllers\UserUniteController@getUnite');

Route::get('/uniteToCreate/{user_id}', 'App\Http\Controllers\UsersController@boucleUniteId');

Route::post('/sessionUniteLevel', 'App\Http\Controllers\UserUniteController@sessionUniteLevel');

Route::get('/getUser/{grade}', 'App\Http\Controllers\UsersController@getUser');

Route::post('/inscription', 'App\Http\Controllers\UsersController@registration');

Route::post('/login', 'App\Http\Controllers\UsersController@login');


Route::get('/', function () {
    return view('welcome');
});

