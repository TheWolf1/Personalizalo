<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MateriaPrima;

class MateriaPrimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Materias = MateriaPrima::all();
        return view('view/materia-prima',compact('Materias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $query = new MateriaPrima;
        $query->descripcion = $request['txtDescripcion'];
        $query->costo = $request['txtCosto'];
        $query->cantidad = $request['txtCantidad'];
        $query->save();
    }

    public function mostrarDetalle(Request $request)
    {
        # code...
        $datos = MateriaPrima::where('id',$request['id'])->get();
        return response()->json([
            'mensaje'=>'todo salio correcto',
            'datos'=>$datos
        ],200);
    }

    public function actualizarDetalle(Request $request)
    {
        # code...
       try {
           //code...
           MateriaPrima::where('id',$request['txtIdD'])->update([
               'descripcion'=>$request['txtDescripcionD'],
               'cantidad'=>$request['txtCantidadD'],
               'costo'=>$request['txtCostoD'],
           ]);
           return "todo salio bien:".$request['txtIdD'];
       } catch (\Throwable $th) {
           return "error: ".$th;
       }
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
