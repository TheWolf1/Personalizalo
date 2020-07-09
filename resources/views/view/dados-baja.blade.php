@extends('main')
@section('titulo')
    Dados de baja
@endsection
@section('styles')
    
@endsection
@section('contenido')
    <div class="row">
        <div class="card card-danger card-outline col-12">
            <div class="card-header">
                <h3> @yield('titulo') </h3>
                <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#modal-dar-baja">Dar de baja un producto</button>
            </div>
            <div class="card-body">
                <!--Buscador-->
                @include('includes/Buscador')
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tablaBajasID">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 80%;">Descripcion</th>
                                <th>Costo</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach ($bajas as $baja)
                                <tr>
                                    <td>{{$baja->producto}}</td>
                                    <td><b>${{$baja->costo}}</b></td>
                                    <td>
                                        <button class="btn btn-danger btnEliminar" id="{{$baja->id}}"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Modal engresar un producto para dar de baja -->
<div class="modal fade" id="modal-dar-baja">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Dar de baja un producto</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formDarBaja">
              @csrf
              <div class="form-group">
                  <label for="">Producto:</label>
                  <select class="form-control" name="slcProd" id="slcProd">
                      <option value="">--Seleccionar</option>
                      @foreach ($productos as $producto)
                      <option value="{{$producto->descripcion}}">{{$producto->descripcion}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="">Costo:</label>
                <input type="text" name="txtCosto" class="form-control" placeholder="Costo:">
            </div>  
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </form>
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
            //Crear una baja
            $("#formDarBaja").submit(function(e){
                e.preventDefault();
                let datos = $("#formDarBaja").serialize();
                consultaAjax("{{route('registrar-baja')}}","POST", datos);
                $("#tablaBajasID").load(" #tablaBajasID");
                $("#modal-dar-baja").modal('hide');
                $("#formDarBaja select").val("");
                $("#formDarBaja input").val("");
            });

            //Eliminar baja
            $(".btnEliminar").click((e)=>{
                var p = confirm("Seguro deseas eliminar este producto ? ");
                if (p) {
                    let datos = "id="+e.currentTarget.id;
                    consultaAjax("{{route('eliminar-baja')}}","GET", datos);
                    $("#tablaBajasID").load(" #tablaBajasID");
                }
            });
        });
        
    </script>
@endsection