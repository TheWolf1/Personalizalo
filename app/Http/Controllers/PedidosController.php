<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\Productos;
use Illuminate\Support\Facades\DB;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $productos = Productos::all();
        $pedidos = Pedido::all();
        return view('view/index',compact('pedidos','productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
       /* $New_pedido = DB::table('pedido')->insert([
            'nombre'=>$request['txtNombre'],
            'cedula'=>$request['txtCedula'],
            'telefono'=>$request['txtTelefono']
        ]);*/
        $nuevo_pedido = new Pedido;
        $nuevo_pedido->nombre = $request['txtNombre'];
        $nuevo_pedido->cedula = $request['txtCedula'];
        $nuevo_pedido->telefono = $request['txtTelefono'];
        $nuevo_pedido->fecha = $request['txtFecha'];
        $nuevo_pedido->descripcion = $request['txtContent'];
        $nuevo_pedido->abono = $request['txtAbono'];
        $nuevo_pedido->total = $request['txtTotal'];
        $nuevo_pedido->estado = "Pendiente";
        $nuevo_pedido->save();

        return "se guardo correctamente";
    }
    public function mostrarDetalle(Request $request){
        $pedido = Pedido::all()->where('id','=',$request['id'])->first();
        return json_encode($pedido);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
