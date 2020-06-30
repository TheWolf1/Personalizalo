@extends('main')
@section('styles')
    <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Date Piker -->
  <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.css')}}">
  <style>
      #nuevoCliente{
          float: right;
      }

      #EstadosID{
          width: 100%;
          border:1px solid #ccc;
      }

  </style>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>20<sup style="font-size: 20px">%</sup></h3>

          <p>Entregado</p>
        </div>
        <div class="icon">
          <i class="fa fa-bicycle"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Listo</p>
        </div>
        <div class="icon">
          <i class="ion ion-checkmark"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>44<sup style="font-size: 20px">%</sup></h3>

          <p>En proceso</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65<sup style="font-size: 20px">%</sup></h3>

          <p>Pendiente</p>
        </div>
        <div class="icon">
          <i class="fa fa-times"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
  </div>
<div class="row">
    <div class="card card-success card-outline col-12">
        <div class="card-header">
            <h3>Pedidos HP</h3>
            <button class="btn btn-success" id="nuevoCliente" data-toggle="modal" data-target="#modal-IngresarCL" >Ingresar Nuevo Cliente</button>
        </div>
        <div class="card-body">
           <div class="table table-responsive">
               <table class="table table-bordered" id="tablaPedidosID">
                   <thead class="table-dark">
                       <tr>
                           <th>Nombre</th>
                           <th>Fecha</th>
                           <th>Estado</th>
                           <th>Detalles</th>
                           <th>Eliminar</th>

                       </tr>
                   </thead>
                   <tbody>
                    @foreach ($pedidos as $pedido)
                       <tr>
                           <td>{{$pedido->nombre}}</td>
                           <td style="width: 20%;">{{$pedido->fecha}}</td>
                           <td style="width: 20%;" id="{{$pedido->id}}">
                            <select class="form-control slcEstados" name="" id="EstadosID">
                              <option value="" disabled>--Seleccionar</option>
                              <option value="Pendiente" <?php if($pedido->estado=="Pendiente"){echo "selected";} ?>>Pendiente</option>
                              <option value="En_Proceso" <?php if($pedido->estado=="En_Proceso"){echo "selected";} ?>>En Proceso</option>
                              <option value="Listo" <?php if($pedido->estado=="Listo"){echo "selected";} ?>>Listo</option>
                              <option value="Entregado" <?php if($pedido->estado=="Entregado"){echo "selected";} ?>>Entregado</option>
                            </select>
                           </td>
                           <td style="width: 10%;"><button class="btn btn-info align-self-center" style="display:flex; margin:0 auto; " onclick="mostrarDetalle({{$pedido->id}})"><i class="fa fa-pen" style="font-size:20px;"></i></button></td>
                           <td style="width: 10%;"><button class="btn btn-danger align-self-center" style="display:flex; margin:0 auto; "><i class="fa fa-trash" style="font-size:20px;"></i></button></td>
                       </tr>
                      @endforeach
                   </tbody>
                   <tfoot>
                       <!--<tr>
                           <td>Valores</td>
                           <td>Valores</td>
                           <td>Valores</td>
                           <td>Valores</td>
                       </tr>-->
                   </tfoot>
               </table>
           </div>
        </div>
    </div>
</div>
<!-- Modal para registrar un cliente -->
<div class="modal fade" id="modal-IngresarCL">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Ingresar nuevo cliente</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form class="form" id="formPedido">
              @csrf
              <div class="form-group">
                  <label for="txtNombreID">Nombre:</label>
                  <input type="text" id="txtNombreID" class="form-control" name="txtNombre" placeholder="Ejemplo: Juan">
              </div>
              <div class="form-group">
                <label for="txtCedulaID">Cedula:</label>
                <input type="text" class="form-control" id="txtCedulaID" name="txtCedula" placeholder="Ejemplo: 1003138383">
              </div>
              <div class="form-group">
                  <label for="txtTelefonoID">Telefono:</label>
                  <input type="text" class="form-control" id="txtTelefonoID" name="txtTelefono" placeholder="Ejemplo: 0963282309">
              </div>
              <div class="form-group">
                <label for="txtTelefonoID">Fecha de entrega:</label>
                <input type="text" class="form-control" id="txtFechaID" name="txtFecha" placeholder="Ejemplo: 02/01/2020">
            </div>
              <div class="form-group">
                <label for="txtTelefonoID">Articulo:</label>
                <select class="form-control" name="txtPedido" id="productoPut">
                    <option  value="--Seleccionar" selected>--Seleccionar</option>
                  @foreach ($productos as $producto)
                    <option  value="{{$producto['descripcion']}}">{{$producto['descripcion']}}</option>
                  @endforeach
                </select>
            </div>
            <div class="form-group pad">
                <div class="mb-3">
                    <textarea class="textarea" id="txtDescripcionID" placeholder="Ingrese la descripcion"
                              style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                <div class="col-6">
                    <label for="txtAbonoID">Abono:</label>
                    <input type="text" name="txtAbono" id="txtAbonoID" placeholder="Ejemplo: 8.50" required>
                </div>
                <div class="col-6">
                    <label for="txtAbonoID">Total:</label>
                    <input type="text" name="txtTotal" id="txtTotalID" placeholder="Ejemplo: 8.50" required>
                </div>
            </div>
            </div>
            <div class="form-group">
              <label for="">Estado:</label>
              <select class="form-control" name="EstadoPedido" id="EstadoPedidoID">
                <option value="">--Seleccionar</option>
                <option value="Pendiente">Pendiente</option>
                <option value="En_Proceso">En Proceso</option>
                <option value="Listo">Listo</option>
                <option value="Entregado">Entregado</option>
              </select>
            </div>
          
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-success">Guardar</button>
        </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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
        <p><b>Estado:</b><span id="DetalleEstadoID"></span></p>
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
<!-- datepicker -->
<script src=" {{asset('plugins/jquery-ui/jquery-ui.min.js')}} "></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<script>
  $(document).ready(function(){
      validarEstadoPedido();
      $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '< Ant',
        nextText: 'Sig >',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
      };
      $.datepicker.setDefaults($.datepicker.regional['es']);
      $(function () {
      $("#txtFechaID").datepicker();
      });
      $("#txtFechaID").datepicker({
      format: 'mm/dd/yyyy',
      startDate: '-3d'
    });
    $(function () {
      // Summernote
      $('.textarea').summernote()
    });
    //Ingreso de pedido
    $("#formPedido").submit(function(e){
      e.preventDefault();
      var descri = $(".note-editable").html();
      var datos = $("#formPedido").serialize()+"&txtContent="+descri+"&arProd="+JSON.stringify(A_articulos);
      $.ajax({
        url: '{{route("ingresarPedido")}}',
        type:'POST',
        dataType:'JSON',
        data:datos,
        success:function(e){
          console.log(e);
          $("#tablaPedidosID").load(" #tablaPedidosID");
          $("#modal-IngresarCL").modal('hide');
          $("#formPedido input").val("");
          $(".note-editable").html("");
        },
        error:function(error){
          alert("A ocurrido un error: "+error);
        },
        complete:function(){
          validarEstadoPedido();
        }
      });
    });

    //Agregar un producto a el textarea
    var articulos= new Array();
    var A_articulos = new Array();
    $("#productoPut").change(function(){
      if(articulos.indexOf($("#productoPut").val())<0){
        articulos.push($("#productoPut").val());
        A_articulos.push({
          'producto':$("#productoPut").val(),
          'cantidad':1
        });
        let datos = "<li>"+$("#productoPut").val()+"</li>";
        $(".note-editable").html("");
        A_articulos.forEach((value,index)=>{
          $(".note-editable").append('<li>'+value.producto+' Cantidad: '+value.cantidad+'</li>');
        });
        $("#productoPut").val("--Seleccionar");
      }else{
        A_articulos.forEach((value, index)=>{
          if(value.producto==$("#productoPut").val()){
            A_articulos[index].cantidad+=1;
          }
        });
        $(".note-editable").html("");
        A_articulos.forEach((value,index)=>{
          $(".note-editable").append('<li>'+value.producto+' Cantidad: '+value.cantidad+'</li>');
        });
        $("#productoPut").val("--Seleccionar");
      }
    });
    //validar estado del pedido
    $(".slcEstados").change(function(e){
      e.preventDefault();
      let datos = "id="+$(this).parent()[0].id+"&Estado="+$(this).val();
      $.ajax({
        type:'GET',
        url:"{{route('actualizarEstado')}}",
        data:datos,
        success:function(response){
          validarEstadoPedido();
        },
        error:function(error){
          alert("lo sentimos a ocurrido un error: "+error);
        }
      });
    });
    
    function validarEstadoPedido(){
      let estado = $(".slcEstados");
      for (let i = 0; i < estado.length; i++) {
        if (estado[i].value=="Pendiente") {
          estado[i].style.background = "#dc3545";
          estado[i].style.color = "#ffffff";
        }
        if (estado[i].value=="En_Proceso") {
          estado[i].style.background = "#ffc107";
          estado[i].style.color = "#ffffff";
        }
        if (estado[i].value=="Listo") {
          estado[i].style.background = "#17a2b8";
          estado[i].style.color = "#ffffff";
        }
        if (estado[i].value=="Entregado") {
          estado[i].style.background = "#28a745";
          estado[i].style.color = "#ffffff";
        }
      }
    }
});



//Ver detalles del pedido
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
    error:function(){
      console.log("a ocurrido un error");
    }
  }); 
}
</script>
@endsection