<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Funeraria San Pedro</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(auth('usuario')->user()->foto)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth('usuario')->user()->mail; }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('usuarios.index')}}" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('pagos.index')}}" class="nav-link">
              <i class="fas fa-money-check-alt"></i>
              <p>
                Pagos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link">
              <i class="fas fa-user-tie"></i>
              <p>
                Roles
              </p>
            </a>          
        </li>
        <li class="nav-item">
          <a href="{{route('sucursals.index')}}" class="nav-link">
            <i class="fas fa-building"></i>
            <p>
              Sucursales
            </p>
          </a>          
      </li>
        <li class="nav-item">
          <a href="{{route('sucursals.index')}}" class="nav-link">
            <i class="fas fa-building"></i>
            <p>
              Items
            </p>
          </a>          
      </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>