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
    Route::get('/view/{id}', 'ClienteController@getView')->name('cliente.getView');
    Route::delete('/delete', 'ClienteController@delete')->name('cliente.delete');
});

Route::group(['prefix' => 'produto'], function (){
    Route::get('/', 'ProdutoController@index')->name('produto.index');
    Route::get('/create', 'ProdutoController@getCreate')->name('produto.getCreate');
    Route::post('/create', 'ProdutoController@postCreate')->name('produto.postCreate');
    Route::get('/edit/{id}', 'ProdutoController@getEdit')->name('produto.getEdit');
    Route::put('/edit/{id}', 'ProdutoController@putEdit')->name('produto.putEdit');
    Route::delete('/delete', 'ProdutoController@delete')->name('produto.delete');
});

