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



//Pagina principal
Route::get('/', 'Pedidoscontroller@index')->name('index');
Route::post('/ingresarPedido','Pedidoscontroller@create')->name('ingresarPedido');
Route::get('/mostrarPedido','Pedidoscontroller@mostrarDetalle')->name('mostrarPedido');
Route::get('/actualizarEstado','Pedidoscontroller@ActualizarEstado')->name('actualizarEstado');




//Pagina de productos
Route::get('/Productos','ProductosController@index')->name('productos');
Route::post('/ingresarProducto','ProductosController@create')->name('ingresarProducto');
Route::get('/DetalleProductos','ProductosController@mostrarProducto')->name('detalleProductos');
Route::post('/ActualizarProducto','ProductosController@actualizarProducto')->name('ActualizarProducto');
