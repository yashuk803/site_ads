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

Route::get('/', 'HomeController@index')->name('home');
Route::post('/login', 'Auth\AuthController@login')->name('login');

Route::group(['middleware' => 'auth'], function()
{
    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');
});

Route::group([
    'namespace' => 'Ad',
    'middleware' => 'auth',
], function () {

    Route::get('/edit', 'AdController@create')->name('create');
    Route::post('/store', 'AdController@store')->name('store');
    Route::patch('/update{id}', 'AdController@update')->name('update');
    Route::get('/delete/{id}', 'AdController@delete')->name('delete');
    Route::get('/edit/{id}', 'AdController@edit')->name('edit');
});

Route::group([
    'namespace' => 'Ad',
], function () {

    Route::get('/{id}', 'AdController@getById')->name('show');
});



