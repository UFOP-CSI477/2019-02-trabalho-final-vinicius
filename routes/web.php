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

Route::get('/', 'PaginasController@index')->name('index');


Auth::routes();

Route::resource('/carrinhos', 'CarrinhoController');
Route::resource('/pedidos', 'PedidoController');

Route::PATCH('/carrinhosadd/{id}','CarrinhoController@update_add')->name('carrinhosadd');
Route::PATCH('/carrinhossub/{id}','CarrinhoController@update_sub')->name('carrinhossub');

Route::get('/home', 'HomeController@index')->name('home');
