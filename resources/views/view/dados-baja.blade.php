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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th style="width: 80%;">Descripcion</th>
                                <th>Costo</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Camisa</td>
                                <td><b>$3</b></td>
                                <td>
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
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
              <div class="form-group">
                  <label for="">Producto:</label>
                  <select class="form-control" name="" id="slcProd">
                      <option value="">--Seleccionar</option>
                      @foreach ($productos as $producto)
                      <option value="{{$producto->id}}">{{$producto->descripcion}}</option>
                      @endforeach
                  </select>
              </div>
              <div class="form-group">
                <label for="">Costo:</label>
                <input type="text" class="form-control" placeholder="Costo:">
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
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
        $("#slcProd").change(function(){
            $.ajax({
                url:"{{route('registrar-baja')}}",
                type:"POST",
                data:"id="$("#slcProd").val(),
                success:function(res){
                    console.log(res);
                },
                error:function(error){
                    console.log(error);
                }
            });
        });
    </script>
@endsection