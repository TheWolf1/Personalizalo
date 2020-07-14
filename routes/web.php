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


Route::get('/', function ()
{
    # code...
    return view('auth/login');
});


Route::group(["prefix"=>'admin'],function()
{
    //Pagina principal
    Route::get('/', 'Pedidoscontroller@index')->name('index')->middleware('auth');
    Route::post('/ingresarPedido','Pedidoscontroller@create')->name('ingresarPedido')->middleware('auth');
    Route::get('/mostrarPedido','Pedidoscontroller@mostrarDetalle')->name('mostrarPedido')->middleware('auth');
    Route::get('/actualizarEstado','Pedidoscontroller@ActualizarEstado')->name('actualizarEstado')->middleware('auth');
    Route::get('eliminarPedido','Pedidoscontroller@eliminarPedido')->name('eliminarPedido')->middleware('auth');

    //Pagina de productos
    Route::get('/Productos','ProductosController@index')->name('productos')->middleware('auth');
    Route::post('/ingresarProducto','ProductosController@create')->name('ingresarProducto')->middleware('auth');
    Route::get('/DetalleProductos','ProductosController@mostrarProducto')->name('detalleProductos')->middleware('auth');
    Route::post('/ActualizarProducto','ProductosController@actualizarProducto')->name('ActualizarProducto')->middleware('auth');
    Route::get('/EliminarProducto','ProductosController@eliminarProducto')->name("EliminarProducto")->middleware('auth');

    //Pagina materia prima
    Route::get('/Materia-prima', 'MateriaPrimaController@index')->name('Materia-prima')->middleware('auth');
    Route::post('/Ingresar-Materia', 'MateriaPrimaController@create')->name('Ingresar-Materia')->middleware('auth');
    Route::get('/Materia-prima-D', 'MateriaPrimaController@mostrarDetalle')->name('Materia-prima-D')->middleware('auth');
    Route::post('/ActualizarMateria','MateriaPrimaController@actualizarDetalle')->name('ActualizarMateria')->middleware('auth');
    Route::get("/eliminarMateria",'MateriaPrimaController@eliminarMateria')->name("eliminarMateria")->middleware('auth');

    //Productos expuestos
    Route::get('/Productos-Expuestos','ProductoExpuestoController@index')->name('Productos-Expuestos')->middleware('auth');
    Route::post('/Ingresar-Productos-Expuestos', 'ProductoExpuestoController@create')->name('Ingresar-Productos-Expuestos')->middleware('auth');
    Route::get("/EliminarProductoExpuesto","ProductoExpuestoController@delete")->name('EliminarProductoExpuesto');

    //Productos entregados
    Route::get('/Productos-Entregados','ProductoEntregadoController@index')->name('Productos-Entregados')->middleware('auth');
    Route::get('/EliminarProductoEntregado','ProductoEntregadoController@delete')->name("EliminarProductoEntregado")->middleware('auth');

    //Productos vendidos
    Route::get('/Productos-vendidos','VendidoController@index')->name('Productos-vendidos');

    //Productos dados de baja
    Route::get('/Dados-de-baja','DadosBajaController@index')->name('Dados-de-baja')->middleware('auth');
    Route::post('/registrar-baja','DadosBajaController@create')->name('registrar-baja')->middleware('auth');
    Route::get('/EliminarBaja','DadosBajaController@delete')->name('eliminar-baja')->middleware('auth');

    //Usuarios
    Route::get('/Usuarios',"UsuarioController@index")->name('Usuarios');
    Route::post('/CrearUsuario',"UsuarioController@create")->name('CrearUsuario');
    Route::get('/DeleteUsuario',"UsuarioController@delete")->name('DeleteUsuario');

    //Buscador
    Route::post('/buscarProducto','BuscadorController@buscarProducto')->name("buscarProducto");

    //Cerrar session
    Route::get('/CerrarSession',function(){
        Auth::logout();
        return redirect('login');
    })->name("cerrarSession");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

