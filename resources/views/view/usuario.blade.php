@extends('main')
@section('titulo')
    Usuarios
@endsection
@section('styles')
    
@endsection
@section('contenido')
    <div class="row">
        <div class="card card-success card-outline col-12">
            <div class="card-header">
                <h3>
                    @yield('titulo')
                </h3>
                <button class="btn btn-success" style="float: right;"  data-toggle="modal" data-target="#modal-registrarUser">Registrar Usuario</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tblUsers">
                        <thead class="table-dark">
                            <tr>
                                <th>Nombre:</th>
                                <th>Correo:</th>
                                <th style="width: 10%;">Eliminar:</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>
                                    <button class="btn btn-danger btnEliminar" id="{{$usuario->id}}" style="display: flex; margin: 0 auto;"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Registrar nuevo usuario -->
    <div class="modal fade" id="modal-registrarUser">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Registrar Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form id="formCrearUser" >
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo:') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña:') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repetir Contraseña') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">
                 {{ __('Register') }}
                </button>
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
        $("#formCrearUser").submit((e)=>{
            e.preventDefault();
            dato = $("#formCrearUser").serialize();
            consultaAjax("{{route('CrearUsuario')}}", "POST", dato);
            $("#tblUsers").load(" #tblUsers");
            $("#modal-registrarUser").modal("hide");
        });
        $(".btnEliminar").click((e)=>{
            let p = confirm("Seguro desea eliminar el usuario?");
            if (p) {
                datos = "id="+e.currentTarget.id;
                consultaAjax("{{route('DeleteUsuario')}}", "GET", datos);
                $("#tblUsers").load(" #tblUsers");
            } 
            
        });
    </script>
@endsection