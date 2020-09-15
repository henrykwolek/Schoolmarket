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
Route::get('/uzytkownik/{user}', 'UserController@showProfile')->name(
  'user-show-profile'
);
Route::get('/kategoria/{category}', 'ShopController@categoryItems')->name(
  'shop-item-category'
);
Route::get('shopitem/{shopItem}', 'ShopController@show')->name(
  'shop-item-show'
);

//Standordowi, zalogowani użytkownicy
Route::middleware('auth')->group(function () {
  //metody GET
  Route::get('/uzytkownik/{user}/edit', 'UserController@editProfile')->name(
    'user.show.detail.profile'
  );
  Route::get('/logout', 'Auth\LoginController@logout');
  Route::get('/shopitems/create', 'ShopController@createView')->name(
    'shop-item-create'
  );
  Route::get('/shopitems/{shopItem}/edit', 'ShopController@editItem')->name(
    'item.edit'
  );
  //metody POST
  Route::post('/shoptitems/create/store', 'ShopController@storeItems')->name(
    'shop-store-items'
  );
  //metody PUT
  Route::put('/uzytkownik/{user}/update', 'UserController@update')->name(
    'update.profile'
  );
  Route::put(
    '/uzytkownik/{user}/update/changepassword',
    'UserController@changePassword'
  )->name('user-change-password');
  //metody PATCH
  Route::put('/shopitem/{shopItem}/update', 'ShopController@update')->name(
    'item-update'
  );
  //metody DELETE
  Route::delete(
    '/uzytkownik/{user}/update/destroy',
    'UserController@destroy'
  )->name('user-destroy-profile');
  Route::delete('shopitem/{shopItem}/destroy', 'ShopController@destroy')->name(
    'item-destroy'
  );
});
