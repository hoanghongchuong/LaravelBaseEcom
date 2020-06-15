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
Route::get('/home', function () {
    return view('home');
});

Route::prefix('categories')->group(function () {
    Route::get('/', [
        'as' => 'categories.index',
        'uses' => 'Admin\CategoryController@index'
    ]);
    Route::get('/create', [
        'as' => 'categories.create',
        'uses' => 'Admin\CategoryController@create'
    ]);
    Route::post('/store', [
        'as' => 'categories.store',
        'uses' => 'Admin\CategoryController@store'
    ]);
    Route::get('edit/{id}', 'Admin\CategoryController@edit')->name('categories.edit');
    Route::post('/update/{id}', [
        'as' => 'categories.update',
        'uses' => 'Admin\CategoryController@update'
    ]);
    Route::get('delete/{id}', 'Admin\CategoryController@delete')->name('categories.delete');
});

Route::prefix('menu')->group(function() {
    Route::get('/', 'Admin\MenuController@index')->name('menu.index');
    Route::get('/create', 'Admin\MenuController@create')->name('menu.create');
    Route::post('/store', 'Admin\MenuController@store')->name('menu.store');
    Route::get('/edit/{id}', 'Admin\MenuController@edit')->name('menu.edit');
    Route::post('/update/{id}', 'Admin\MenuController@update')->name('menu.update');
    Route::get('/delete/{id}', 'Admin\MenuController@delete')->name('menu.delete');
});

Route::prefix('users')->group(function () {
   Route::get('/', 'Admin\UserController@index')->name('users.index');
   Route::get('/create', 'Admin\UserController@create')->name('users.create');
   Route::post('/store', 'Admin\UserController@store')->name('users.store');
   Route::get('/edit/{id}', 'Admin\UserController@edit')->name('users.edit');
   Route::post('/edit/{id}', 'Admin\UserController@update')->name('users.update');
   Route::get('/delete/{id}', 'Admin\UserController@delete')->name('users.delete');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
