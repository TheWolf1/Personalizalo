@extends('main')

@section('titulo')
    Productos   
@endsection
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
            <div class="card-header">
                <h3>@yield('titulo')</h3>
                <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#modal-lg">Crear nuevo producto</button>
            </div>
            <div class="card-body">
                <!--Buscador-->
                @include('includes/Buscador')
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tablaProductos">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 70%;">Descripcion</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                                <th>Precio</th>
                                <th>X12</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach ($registros as $registro)
                                <tr class="@if (($registro['cantidad']<=0) and ($registro['cantidad']<1) ) bg-danger @elseif (($registro['cantidad']>=1) and ($registro['cantidad']<5)) bg-orange @endif " onclick="detalleProducto({{$registro['id']}})">
                                    <td>{{$registro['descripcion']}}</td>
                                    <td>{{$registro['cantidad']}}</td>
                                    <td>${{$registro['costo']}}</td>
                                    <td>${{$registro['precio']}}</td>
                                    <td>${{$registro['docena']}}</td>
                                    </a>
                                </tr>  
                            @endforeach
                            
                        </tbody>
                        <tfoot class="table-dark" style="height: auto;">
                            <tr>
                                <td></td>
                                <td></td>
                                <td style="text-align: center;">
                                    <b class="d-block">Total</b>
                                    <span>${{$sumCosto}}</span>
                                </td>
                                <td style="text-align: center;">
                                    <b class="d-block">Total</b>
                                    <span>${{$sumPrecio}}</span>
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
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
              <form action="#" id="formProductoID">
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
                    <div class="form-group col-6">
                        <label for="txtDescripcionID">Precio x 12:</label>
                        <input type="text" class="form-control" id="txtPrecioDocenaID" name="txtPrecioDocena">
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


      <!-- Modal mostrar detalles del producto -->
      <div class="modal fade" id="modal-detalles-productos">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Default Modal</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="formMostrarDetalleProducto">
                    @csrf
                    <div class="row">
                            <input class="form-control" type="text" name="txtID" id="txtID" disabled hidden>
                        <div class="form-group col-8">
                            <label for="">Detalle:</label>
                            <input class="form-control" type="text" name="txtDetalle" id="txtDetalleID" disabled>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Cantidad:</label>
                            <input class="form-control" type="number" name="txtCantidad" id="txtCantidadDetalleID" disabled>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="">Precio Costo:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                <input class="form-control" type="text" name="txtCosto" id="txtCostoDetalleID" disabled>
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Precio Venta:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                                <input class="form-control" type="text" name="txtPrecio" id="txtPrecioDID" disabled>
                            </div>  
                        </div>
                    </div>
                    <div class="form-group col-8">
                        <label for="">Docena:</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                            </div>
                            <input class="form-control" type="text" name="txtDocenaD" id="txtDocenaDID" disabled>
                        </div>  
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" id="btnEliminarID" data-dismiss="modal">Eliminar</button>
              <button type="button" class="btn btn-primary" id="btnEditarID">Editar</button>
              <button type="submit" class="btn btn-success" id="btnGuardarID">Guardar cambios</button>
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
        $(document).ready(function(){
            $("#btnGuardarID").hide();
            //Nuevo producto
            $("#formProductoID").submit((e)=>{
            var datos = $("#formProductoID").serialize();
                $.ajax({
                    url:"{{route('ingresarProducto')}}",
                    data:datos,
                    type:'POST',
                    success:function(response){
                        $("#tablaProductos").load(" #tablaProductos");
                        $("#modal-lg").modal("hide");
                        $("#formProductoID input").val("");
                    },
                    error:function(error){
                        console.log("error: "+error);
                    }
                });
            });

            $("#btnEditarID").click(function(){
                //activar los inputs del formulario
                $("#formMostrarDetalleProducto input").prop('disabled',false);
                $(this).hide();
                $("#btnGuardarID").show();

            });
            //Actualizar el producto
            $("#formMostrarDetalleProducto").submit((e)=>{
                var datos = $("#formMostrarDetalleProducto").serialize();
                $.ajax({
                    url:"{{route('ActualizarProducto')}}",
                    type:'POST',
                    data:datos,
                    success:function(response){
                        $("#tablaProductos").load(" #tablaProductos");
                        $("#modal-detalles-productos").modal("hide");
                        $("#formMostrarDetalleProducto input").prop('disabled',true);
                        $("#btnGuardarID").hide();
                        $("#btnEditarID").show();
                        $("#formMostrarDetalleProducto input").val("");
                    },
                    error:function(error){
                        alert("lo sentimos a ocurrido un error: "+error);
                    }
                });
            });
            //Eliminar prodcuto
            $("#btnEliminarID").click(function(){
                let id = $("#txtID").val();
                let datos = "id="+id;
                let con = confirm("seguro deseas eliminar?");
                if (con) {
                    $.ajax({
                        url:"{{route('EliminarProducto')}}",
                        data:datos,
                        type:"GET",
                        success:function(res){
                            $("#tablaProductos").load(" #tablaProductos");
                            $("#modal-detalles-productos").modal("hide");
                        },
                        error:function(error){
                            console.log("Lo sentimos a ocurrido un error:"+error);
                        }
                    });
                }
            });


        });
        //Mostrar los detalles del producto
        function detalleProducto(id){
            let datos = "id="+id;
            $.ajax({
                type:'get',
                url:"{{route('detalleProductos')}}",
                data: datos,
                dataType:'JSON',
                success:function(response){
                    response.valor.forEach((value,index) => {
                        $("#txtID").val(value.id);
                        $("#txtDetalleID").val(value.descripcion);
                        $("#txtCantidadDetalleID").val(value.cantidad);
                        $("#txtCostoDetalleID").val(value.costo);
                        $("#txtPrecioDID").val(value.precio);
                        $("#txtDocenaDID").val(value.docena);
                    });
                },
                error:function(error){
                    alert("a ocurrido si un error: "+error);
                }
            });
            $("#modal-detalles-productos").modal("show");
        }
        
    </script>
@endsection