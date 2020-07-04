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
        $Listo = $this->porcentajesEstado('Listo');
        $proceso = $this->porcentajesEstado('En_Proceso');
        $pendiente = $this->porcentajesEstado('Pendiente');
        $productos = Productos::all();
        $pedidos = Pedido::where('estado','<>','Entregado')->get();
        return view('view/index',compact('pedidos','productos','Listo','proceso','pendiente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        try {
            //code...
            $nuevo_pedido = new Pedido;
            $nuevo_pedido->nombre = $request['txtNombre'];
            $nuevo_pedido->cedula = $request['txtCedula'];
            $nuevo_pedido->telefono = $request['txtTelefono'];
            $nuevo_pedido->fecha = $request['txtFecha'];
            $nuevo_pedido->descripcion = $request['txtContent'];
            $nuevo_pedido->abono = $request['txtAbono'];
            $nuevo_pedido->total = $request['txtTotal'];
            $nuevo_pedido->estado = $request['EstadoPedido'];
            $nuevo_pedido->save();
            $miJson = json_decode($request['arProd'],true);
            //return  "el Json es:".implode("|",$miJson);
            foreach ($miJson as $key) {
                # code...
                $cantidad = Productos::select('cantidad')->where('descripcion','=',$key['producto'])->get();
                foreach ($cantidad as $cant) {
                    # code...
                    $suma = $cant->cantidad - $key['cantidad'];
                    Productos::where('descripcion','=',$key['producto'])->update(['cantidad'=>$suma]);
                }
                
            }
        } catch (PDOException $e) {
            //throw $th;
            return response()->json(['a ocurrido un error: '.$e],200);
        }
        
    }

    public function mostrarDetalle(Request $request){
        $pedido = Pedido::all()->where('id','=',$request['id'])->first();
        return json_encode($pedido);
    }

    public function ActualizarEstado(Request $request)
    {
        # code...
        Pedido::where('id',$request['id'])->update(['estado'=>$request['Estado']]);
    }

    public function eliminarPedido(Request $request)
    {
        # code...
        Pedido::where('id',$request['id'])->delete();
    }

    public function porcentajesEstado($value)
    {
        # code...
        $tot = Pedido::where('estado','<>','Entregado')->count('estado');
        $unique = Pedido::where('estado',$value)->count('estado');
        $sum = (100*$unique)/$tot;
        
        //return (float)$sum;
        return number_format($sum,0);
        
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
