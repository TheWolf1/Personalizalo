@extends('main')
@section('titulo')
    Materia Prima
@endsection

@section('styles')
    <style>
        #TablaMateriaPrima td:nth-child(2), td:nth-child(3){
          margin: 0 auto;
          text-align: center;
        }
    </style>
@endsection

@section('contenido')
    <div class="row">
        <div class="card card-success card-outline col-12">
            <div class="card-header ">
                <h3>@yield('titulo')</h3>
                <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#modal-nuevo-articulo">Añadir nuevo elemento</button>
            </div>
            <div class="card-body">
              <!--Buscador-->
              @include('includes/Buscador')
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="TablaMateriaPrima">
                        <thead class="table-dark">
                            <tr>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Costo</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                          @foreach ($Materias as $materia)
                            <tr id="{{$materia['id']}}">
                              <td style="width: 80%;">{{$materia['descripcion']}}</td>
                              <td><b>{{$materia['cantidad']}}</b></td>
                              <td><b>${{$materia['costo']}}</b></td>
                            </tr>
                          @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Ingresar nuevo elemento-->
    <div class="modal fade" id="modal-nuevo-articulo">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ingresar nuevo articulo</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="#" id="formMateriaPrima">
                @csrf
                <div class="form-group">
                  <label for="">Descripcion:</label>
                  <input type="text" class="form-control" name="txtDescripcion" id="ID" placeholder="Ejemplo: Tabla MDF 1x2M">
                </div>
                <div class="form-group">
                  <label for="">Cantidad:</label>
                  <input type="text" class="form-control col-2" name="txtCantidad" id="ID" placeholder="Ejemplo:8.50">
                </div>
                <div class="form-group">
                  <label for="">Costo:</label>
                  <input type="text" class="form-control col-2" name="txtCosto" id="ID" placeholder="Ejemplo:8.50">
                </div>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Guardar</button>
            </form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    <!--Modal Detalles de materia prima-->
    <div class="modal fade" id="modal-detalle-materia">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Detalles</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#" id="formDetalleMateria">
              @csrf
              <input type="text" name="txtIdD" id="txtId" hidden disabled>
              <div class="form-group">
                <label for="">Descripcion:</label>
                <input type="text" class="form-control" name="txtDescripcionD" id="txtDescripcionDID" placeholder="Ejemplo: Tabla MDF 1x2M" disabled>
              </div>
              <div class="form-group">
                <label for="">Cantidad:</label>
                <input type="text" class="form-control col-2" name="txtCantidadD" id="txtCantidadDID" placeholder="Ejemplo:5.2" disabled>
              </div>
              <div class="form-group">
                <label for="">Costo:</label>
                <input type="text" class="form-control col-2" name="txtCostoD" id="txtCostoDID" placeholder="Ejemplo:8.50" disabled>
              </div>            
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal" id="btnEliminarD">Eliminar</button>
            <button type="button" class="btn btn-primary" id="btnEditar">Editar</button>
            <button type="submit" class="btn btn-success" id="btnGuardarD" hidden>Guardar</button>
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
  //Ingresar materia prima
  $("#formMateriaPrima").submit((e)=>{
    datos = $("#formMateriaPrima").serialize();
    $.ajax({
      url:"{{route('Ingresar-Materia')}}",
      type:'POST',
      data:datos,
      success:function(response){
        $("#TablaMateriaPrima").load(" #TablaMateriaPrima");
        $("#formMateriaPrima").reset();
        $("#modal-nuevo-articulo").modal('hide');
      },
      error:function(e){
        console.log("Lo sentimos a ocurrido un error: "+e);
      }
      
    });
  });

  //Mostrar detalle
  $("#TablaMateriaPrima tbody tr").click((v)=>{
    let id = v.currentTarget.id; 
    let datos = "id="+id;
    $.ajax({
      url:"{{route('Materia-prima-D')}}",
      type:"GET",
      data:datos,
      success:function(response){
        let detalles = response.datos;
        detalles.forEach((values, index) => {
          $("#txtId").val(values.id);
          $("#txtDescripcionDID").val(values.descripcion);
          $("#txtCantidadDID").val(values.cantidad);
          $("#txtCostoDID").val(values.costo);
        });
      },
      error:function(e){
        console.log("A ocurrido un error: "+e);
      }
    });
    $("#modal-detalle-materia").modal('show');
  });

  $("#btnEditar").click(function(){
    $(this).hide();
    $("#btnGuardarD").prop('hidden',false);
    $("#formDetalleMateria input").prop('disabled',false);
  });
  $("#formDetalleMateria").submit(function(e){
    let datos = $("#formDetalleMateria").serialize();
    $.ajax({
      url:"{{route('ActualizarMateria')}}",
      type:"POST",
      data:datos,
      success:function(res){
        $("#TablaMateriaPrima").load(" #TablaMateriaPrima");
        $("#modal-detalle-materia").modal('hide');
      },
      error:function(error){
        console.log("Ocurrio un error: "+error);
      }
    });
  });

  //Eliminar materia prima
  $("#btnEliminarD").click(function(){
    dato = "id="+$("#txtId").val();
    let p = confirm("Seguro desea eliminar?");
    if (p) {
        consultaAjax("{{route('eliminarMateria')}}",'GET',dato);
        $("#TablaMateriaPrima").load(" #TablaMateriaPrima");
        $("#modal-detalle-materia").modal('hide');
    }
  });
});
</script>

@endsection

