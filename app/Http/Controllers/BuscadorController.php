<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BuscadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buscarProducto(Request $request)
    {
        # code...
        $data = DB::select("SELECT * FROM productos where descripcion LIKE '%".$request->txtBuscador."%'");
        return response()->json([$data],200);
    }
}
