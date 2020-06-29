<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $registros = Productos::all();
        return view("view/productos",compact('registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $new_prod = new Productos;
        $new_prod->descripcion = $request['txtDescripcion'];
        $new_prod->cantidad = $request['txtCantidad'];
        $new_prod->costo = $request['txtCosto'];
        $new_prod->precio = $request['txtPrecio'];
        $new_prod->save();
        return "todo salio bien".$request['txtDescripcion'];
    }

    public function mostrarProducto(Request $request)
    {
        # code...
        $prod = Productos::where('id','=',$request['id'])->get();

        return response()->json([
            'mensaje'=>'todo salio bien',
            'valor' => $prod
        ],200);
    }


    public function actualizarProducto(Request $request)
    {
        # code...
        try {
            //code...
            Productos::where('id',$request['txtID'])->update([
                'descripcion'=>$request['txtDetalle'],
                'cantidad' =>$request['txtCantidad'],
                'costo' =>$request['txtCosto'],
                'precio' =>$request['txtPrecio']
                ]);
            return "todo salio bien ".$request['txtID'];
        } catch (\Throwable $th) {
            //throw $th;
            return "error: ".$th;
        }

        return "el id es: ".$request['txtID'];

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
