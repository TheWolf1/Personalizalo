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





Route::group(["prefix"=>'admin'],function()
{
    //Pagina principal
    Route::get('/', 'Pedidoscontroller@index')->name('index');
    Route::post('/ingresarPedido','Pedidoscontroller@create')->name('ingresarPedido');
    Route::get('/mostrarPedido','Pedidoscontroller@mostrarDetalle')->name('mostrarPedido');
    Route::get('/actualizarEstado','Pedidoscontroller@ActualizarEstado')->name('actualizarEstado');
    Route::get('eliminarPedido','Pedidoscontroller@eliminarPedido')->name('eliminarPedido');

    //Pagina de productos
    Route::get('/Productos','ProductosController@index')->name('productos');
    Route::post('/ingresarProducto','ProductosController@create')->name('ingresarProducto');
    Route::get('/DetalleProductos','ProductosController@mostrarProducto')->name('detalleProductos');
    Route::post('/ActualizarProducto','ProductosController@actualizarProducto')->name('ActualizarProducto');

    //Pagina materia prima
    Route::get('/Materia-prima', 'MateriaPrimaController@index')->name('Materia-prima');
    Route::post('/Ingresar-Materia', 'MateriaPrimaController@create')->name('Ingresar-Materia');
    Route::get('/Materia-prima-D', 'MateriaPrimaController@mostrarDetalle')->name('Materia-prima-D');
    Route::post('/ActualizarMateria','MateriaPrimaController@actualizarDetalle')->name('ActualizarMateria');

    //Productos expuestos
    Route::get('/Productos-Expuestos','ProductoExpuestoController@index')->name('Productos-Expuestos');
    Route::post('/Ingresar-Productos-Expuestos', 'ProductoExpuestoController@create')->name('Ingresar-Productos-Expuestos');
});




