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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('game')->name('game.')->middleware('auth')->group(function () {
    Route::get('/', 'GameController@index')->name('index');
    Route::get('create', 'GameController@create')->name('create');
    Route::post('store', 'GameController@store')->name('store');
    Route::get('{game}', 'GameController@show')->name('show');
    Route::get('{game}/edit', 'GameController@edit')->name('edit');
    Route::patch('{game}/update', 'GameController@update')->name('update');
    Route::delete('{game}/delete', 'GameController@destroy')->name('delete');
});
