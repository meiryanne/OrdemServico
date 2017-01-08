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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'cliente'], function (){
    Route::get('/', 'ClienteController@index')->name('cliente.index');
    Route::get('/create', 'ClienteController@getCreate')->name('cliente.getCreate');
    Route::post('/create', 'ClienteController@postCreate')->name('cliente.postCreate');
    Route::get('/edit/{id}', 'ClienteController@getEdit')->name('cliente.getEdit');
    Route::put('/edit/{id}', 'ClienteController@putEdit')->name('cliente.putEdit');
    Route::delete('/delete', 'ClienteController@delete')->name('cliente.delete');
});
