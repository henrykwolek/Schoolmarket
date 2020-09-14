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

Auth::routes();

//Zasoby dostępne dla zwykłych, niezalogowanych użytkowników
Route::get('/', 'HomeController@index')->name('home');
Route::get('/uzytkownik/{user}', 'UserController@showProfile')->name('user-show-profile');

//Standordowi, zalogowani użytkownicy
Route::middleware('auth')->group(function()
    {
        Route::get('/uzytkownik/{user}/edit', 'UserController@editProfile')->name('user.show.detail.profile');
        Route::get('/logout', 'Auth\LoginController@logout');
        Route::put('/uzytkownik/{user}/update', 'UserController@update')->name('update.profile');
    });


