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
          <i class="ion ion-checkmark"></i>
        </div>
        
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>53<sup style="font-size: 20px">%</sup></h3>

          <p>Enviado</p>
        </div>
        <div class="icon">
          <i class="fa fa-bicycle"></i>
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
            <h3>Pedidos</h3>
            <button class="btn btn-success" id="nuevoCliente" data-toggle="modal" data-target="#modal-IngresarCL" >Ingresar Nuevo Cliente</button>
        </div>
        <div class="card-body">
           <div class="table table-responsive">
               <table class="table table-bordered">
                   <thead class="table-dark">
                       <tr>
                           <th>Nombre</th>
                           <th>Fecha</th>
                           <th>Estado</th>
                           <th>Abono</th>
                           <th>Total</th>

                       </tr>
                   </thead>
                   <tbody>
                       <tr>
                           <td>Valores</td>
                           <td>Valores</td>
                           <td>Valores</td>
                           <td>Valores</td>
                       </tr>
                   </tbody>
                   <tfoot>
                       <tr>
                           <td>Valores</td>
                           <td>Valores</td>
                           <td>Valores</td>
                           <td>Valores</td>
                       </tr>
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
          <form class="form" method="POST" action="#">
              <div class="form-group">
                  <label for="txtNombreID">Nombre:</label>
                  <input type="text" id="txtNombreID" class="form-control" placeholder="Ejemplo: Juan">
              </div>
              <div class="form-group">
                <label for="txtCedulaID">Cedula:</label>
                <input type="text" class="form-control" id="txtCedulaID" placeholder="Ejemplo: 1003138383">
              </div>
              <div class="form-group">
                  <label for="txtTelefonoID">Telefono:</label>
                  <input type="text" class="form-control" id="txtTelefonoID" placeholder="Ejemplo: 0963282309">
              </div>
              <div class="form-group">
                <label for="txtTelefonoID">Fecha de entrega:</label>
                <input type="text" class="form-control" id="txtFechaID" placeholder="Ejemplo: 02/01/2020">
            </div>
              <div class="form-group">
                <label for="txtTelefonoID">Articulo:</label>
                <select class="form-control" name="" id="">
                    <option  value="valor1">Articulo</option>
                </select>
            </div>
            <div class="form-group pad">
                <div class="mb-3">
                    <textarea class="textarea" placeholder="Place some text here"
                              style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                <div class="col-6">
                    <label for="txtAbonoID">Abono:</label>
                    <input type="text" name="" id="txtAbonoID" placeholder="Ejemplo: 8.50" required>
                </div>
                <div class="col-6">
                    <label for="txtAbonoID">Total:</label>
                    <input type="text" name="" id="txtAbonoID" placeholder="Ejemplo: 8.50" required>
                </div>
            </div>
            </div>
          </form>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-success">Guardar</button>
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
</script>
@endsection