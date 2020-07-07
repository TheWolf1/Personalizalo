<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/icono.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Personalizalo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @auth
                {{auth()->user()->name}}
            @endauth
          </a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('index')}}" class="nav-link {{ ! Route::is('index') ?: 'active'}}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Inicio
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('productos')}}" class="nav-link {{ ! Route::is('productos') ?: 'active'}}">
              <i class="nav-icon fas fa-puzzle-piece"></i>
              <p>
                Productos
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-archive"></i>
              <p>
                Articulos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Materia-prima')}}" class="nav-link {{ ! Route::is('Materia-prima') ?: 'active'}}">
                  <i class="fas fa-shopping-basket nav-icon"></i>
                  <p>Materia prima</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Productos-Expuestos')}}" class="nav-link {{ ! Route::is('Productos-Expuestos') ?: 'active'}}">
                  <i class="fa fa-smile nav-icon"></i>
                  <p>Expuestos</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Productos-Entregados')}}" class="nav-link {{ ! Route::is('Productos-Entregados') ?: 'active'}}">
                  <i class="fa fa-check nav-icon"></i>
                  <p>Productos Entregados</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Dados-de-baja')}}" class="nav-link {{ ! Route::is('Dados-de-baja') ?: 'active'}}">
                  <i class="fa fa-arrow-down nav-icon"></i>
                  <p>Dados de baja</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('Usuarios')}}" class="nav-link {{ ! Route::is('Usuarios') ?: 'active'}}">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Configuraciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('cerrarSession')}}" class="nav-link">
              <i class="nav-icon fa fa-sign-out" aria-hidden="true"></i>
              <p>
                Cerrar session
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>