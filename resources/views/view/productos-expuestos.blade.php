@extends('main')
@section('titulo')
    Productos Expuestos
@endsection

@section('styles')
    <style>
        #TablaProductosExpuestos td:nth-child(2), td:nth-child(3){
          text-align: center;
        }
    </style>
@endsection

@section('contenido')
    <div class="row">
        <div class="card card-success card-outline col-12">
            <div class="card-header ">
                <h3>@yield('titulo')</h3>
                <button class="btn btn-success" style="float: right;" data-toggle="modal" data-target="#modal-nuevo-producto-Ex">Añadir nuevo elemento</button>
            </div>
            <div class="card-body">
              <!--Buscador-->
              @include('includes/Buscador')
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="TablaProductosExpuestos">
                        <thead class="table-dark">
                            <tr>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Vender</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody class="buscar">
                            @foreach ($expuestos as $expuesto)
                                <tr id="{{$expuesto->id}}">
                                    <td style="width: 80%;">{{$expuesto->descripcion}}</td>
                                    <td><b>${{$expuesto->precio}}</b></td>
                                    <td><button class="btn btn-success" ><i class="fa fa-credit-card"></i></button></td>
                                    <td><button class="btn btn-danger btnEliminarP" id="{{$expuesto->id}}"><i class="fa fa-trash"></i></button></td>
                                </tr>                                
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!--Modal Ingresar nuevo Producto-->
    <div class="modal fade" id="modal-nuevo-producto-Ex">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ingresar nuevo Producto</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form id="formProductoExpuesto">
                @csrf
                <div class="form-group">
                  <label for="">Descripcion:</label>
                  <select class="form-control" name="slcDescripcion" id="">
                      <option value="">--Seleccionar</option>
                      @foreach ($productos as $producto)
                          <option  value="{{$producto['descripcion']}}">{{$producto['descripcion']}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Precio:</label>
                  <input type="text" class="form-control col-2" name="txtPrecio" id="ID" placeholder="Ejemplo:8.50">
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
@endsection

@section('scripts')
<script>
$(document).ready(function(){
  //Ingresar materia prima
  $("#formProductoExpuesto").submit((e)=>{
    datos = $("#formProductoExpuesto").serialize();
    $.ajax({
      url:"{{route('Ingresar-Productos-Expuestos')}}",
      type:'POST',
      data:datos,
      success:function(response){
          console.log(response);
        $("#TablaProductosExpuestos").load(" #TablaProductosExpuestos");
        $("#modal-nuevo-producto-Ex").modal('hide');
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
  //Eliminar producto
  $(".btnEliminarP").click(function(e){
    dato = "id="+e.currentTarget.id;
    var p = confirm("Seguro deseas eliminar este producto?");
    if (p) {
      consultaAjax("{{route('EliminarProductoExpuesto')}}","GET", dato);
      $("#TablaProductosExpuestos").load(" #TablaProductosExpuestos");
    }
    
  });
});
</script>
@endsection






