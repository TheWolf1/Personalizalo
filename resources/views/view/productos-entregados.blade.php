@extends('main')
@section('titulo')
    Productos Entregados
@endsection
@section('styles')
    
@endsection
@section('contenido')
    <div class="row">
        <div class="card col-12 card-danger card-outline">
            <div class="card-header">
                <h3>@yield('titulo')</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="tblProdEntregados">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre</th>
                                <th>Fecha de entrega</th>
                                <th>Detalles</th>
                                <th>Eliminar</th>
     
                            </tr>
                        </thead>
                        <tbody>
                         @foreach ($pedidos as $pedido)
                            <tr>
                                <td>{{$pedido->nombre}}</td>
                                <td style="width: 20%;">{{$pedido->fecha}}</td>
                                <td style="width: 10%;"><button class="btn btn-info align-self-center" style="display:flex; margin:0 auto; " onclick="mostrarDetalle({{$pedido->id}})"><i class="fa fa-pen" style="font-size:20px;"></i></button></td>
                               <td style="width: 10%;"><button class="btn btn-danger align-self-center btnEliminar" id="{{$pedido->id}}" style="display:flex; margin:0 auto; "><i class="fa fa-trash" style="font-size:20px;"></i></button></td>
                            </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Modal para mostrar los detalles del pedido -->
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="DetallePedido">
          <p><b>Nombre:</b><span id="DetalleNombreID"></span></p>
          <p><b>Cedula:</b><span id="DetalleCedulaID"></span></p>
          <p><b>Telefono:</b><span id="DetalleTelefonoID"></span></p>
          <p><b>Fecha de entrega:</b><span id="DetalleFechaID"></span></p>
          <p><b>Descripcion:</b><span id="DetalleDescripcionID"></span></p>
          <p><b>Abono:</b>$<span id="DetalleAbonoID"></span></p>
          <p><b>Total:</b>$<span id="DetalleTotalID"></span></p>
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
@endsection
@section('scripts')
<script>
  $(document).ready(function(){
    $(".btnEliminar").click((e)=>{
      var datos = "id="+e.currentTarget.id;
      consultaAjax("{{route('EliminarProductoEntregado')}}", "GET", datos);
      $("#tblProdEntregados").load(" #tblProdEntregados");
    });
  });
    function mostrarDetalle(id){
        let dato = 'id='+id; 
        $.ajax({
            url:'{{route("mostrarPedido")}}',
            type:'GET',
            data:dato,
            dataType:'json',
            success:function(e){
            $("#DetallePedido span").html("");
            $("#DetalleNombreID").append(e.nombre);
            $("#DetalleCedulaID").append(e.cedula);
            $("#DetalleTelefonoID").append(e.telefono);
            $("#DetalleFechaID").append(e.fecha);
            $("#DetalleDescripcionID").append(e.descripcion);
            $("#DetalleAbonoID").append(e.abono);
            $("#DetalleTotalID").append(e.total);
            $("#modal-lg").modal('show');
            },
            error:function(e){
            console.log("a ocurrido un error"+e);
            }
        }); 
    }
</script>
@endsection