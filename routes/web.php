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

Route::get('/', 'Pedidoscontroller@index')->name('index');
Route::post('/ingresarPedido','Pedidoscontroller@create')->name('ingresarPedido');
Route::get('/mostrarPedido','Pedidoscontroller@mostrarDetalle')->name('mostrarPedido');



Route::get('/Productos','ProductosController@index')->name('productos');
