@extends('main')
@section('titulo')
    Productos vendidos
@endsection
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <style>
    </style>
@endsection
@section('contenido')
    <div class="row">
        <div class="card card-danger card-outline col-12">
            <div class="card-header">
                <h3>@yield('titulo')</h3>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered tablaId">
                    <thead class="table-dark">
                        <tr>
                            <th style="width: 10%;">Cantidad</th>
                            <th>Descripcion</th>
                            <th>Fecha</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                    <tfoot class="table-dark">
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th>Total</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <!-- DataTables -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endsection