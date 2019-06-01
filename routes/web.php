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
//    return view('welcome');
    return redirect('login');
});

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('log_out');

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('game')->name('game.')->group(function () {
        Route::get('/', 'GameController@index')->name('index');
        Route::get('create', 'GameController@create')->name('create');
        Route::post('store', 'GameController@store')->name('store');
        Route::get('search', 'GameController@search')->name('search');
        Route::get('{game}', 'GameController@show')->name('show');
        Route::get('{game}/edit', 'GameController@edit')->name('edit');
        Route::patch('{game}/update', 'GameController@update')->name('update');
        Route::delete('{game}/delete', 'GameController@destroy')->name('delete');
    });

    Route::prefix('edition')->name('edition.')->group(function () {
        Route::get('/', 'EditionController@index')->name('index');
        Route::get('create', 'EditionController@create')->name('create');
        Route::post('store', 'EditionController@store')->name('store');
        Route::get('search', 'EditionController@search')->name('search');
        Route::get('{edition}', 'EditionController@show')->name('show');
        Route::get('{edition}/edit', 'EditionController@edit')->name('edit');
        Route::patch('{edition}/update', 'EditionController@update')->name('update');
        Route::delete('{edition}/delete', 'EditionController@destroy')->name('delete');
    });

});
