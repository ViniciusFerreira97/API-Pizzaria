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

Route::post('/cliente','ClienteController@inserirCliente');
Route::put('/cliente','ClienteController@alterarCliente');
Route::get('/cliente','ClienteController@getClientes');
Route::delete('/cliente','ClienteController@excluirCliente');

Route::post('/pizza','PizzaController@inserirPizza');
Route::put('/pizza','PizzaController@alterarPizza');
Route::get('/pizza','PizzaController@getPizzas');
Route::delete('/pizza','PizzaController@excluirPizza');

Route::post('/pedido','PedidoController@novoPedido');
Route::put('/pedido','PedidoController@alterarPedido');
Route::get('/pedido','PedidoController@getPedidos');
Route::delete('/pedido','PedidoController@excluirPedido');




