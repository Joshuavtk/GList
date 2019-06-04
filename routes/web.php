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

    Route::prefix('tag')->name('tag.')->group(function () {
        Route::get('/', 'TagController@index')->name('index');
        Route::get('create', 'TagController@create')->name('create');
        Route::post('store', 'TagController@store')->name('store');
        Route::get('search', 'TagController@search')->name('search');
        Route::get('{tag}', 'TagController@show')->name('show');
        Route::get('{tag}/edit', 'TagController@edit')->name('edit');
        Route::patch('{tag}/update', 'TagController@update')->name('update');
        Route::delete('{tag}/delete', 'TagController@destroy')->name('delete');
    });

});
