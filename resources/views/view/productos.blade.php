@extends('main')


@section('styles')
   <style>
       #tablaProductos tbody{
        cursor: pointer;
       }
   </style>
@endsection
@section('contenido')
    <div class="row">
        <div class="card card-success card-outline col-12">
            <div class="card-head">
                <h3>Productos</h3>
                <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#modal-lg">Crear nuevo producto</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablaProductos">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 50%;">Descripcion</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registros as $registro)
                                <tr onclick="saludo({{$registro['id']}})">
                                    <td>{{$registro['descripcion']}}</td>
                                    <td>{{$registro['cantidad']}}</td>
                                    <td>${{$registro['costo']}}</td>
                                    <td>${{$registro['precio']}}</td>
                                    </a>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal producto nuevo -->
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Nuevo producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#" id="formProductosID">
                  @csrf
                  <div class="form-group">
                      <label for="txtDescripcionID">Descripcion:</label>
                      <input type="text" class="form-control" id="txtDescripcionID" name="txtDescripcion">
                  </div>
                  <div class="form-group">
                    <label for="txtDescripcionID">Cantidad:</label>
                    <input type="number" class="form-control" id="txtCantidadID" name="txtCantidad">
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                        <label for="txtDescripcionID">Costo:</label>
                        <input type="text" class="form-control" id="txtCostoID" name="txtCosto">
                    </div>
                    <div class="form-group col-6">
                        <label for="txtDescripcionID">Precio:</label>
                        <input type="text" class="form-control" id="txtPrecioID" name="txtPrecio">
                    </div>
                  </div>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection


@section('scripts')
    <script>
        $("#formProductosID").submit((e)=>{
            e.preventDefault();
            var datos = $("#formProductosID").serialize();
            $.ajax({
                url:"{{route('ingresarProducto')}}",
                data:datos,
                type:'POST',
                success:function(response){
                    $("#tablaProductos").load(" #tablaProductos");
                    $("#modal-lg").modal("hide");
                },
                error:function(error){
                    console.log("error: "+error);
                }
            });
        });
        function saludo(id){
            alert("el id es: "+id);
        }
    </script>
@endsection