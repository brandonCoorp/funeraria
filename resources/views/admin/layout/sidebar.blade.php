<aside id ="nav_Izq" class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}"  id="logo_funeraria" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Funeraria San Pedro</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset(auth('usuario')->user()->usuariofotofechas[0]->foto)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('usuarios.edit',auth('usuario')->user()->id)}}" class="d-block" data-visita="{{session('prueba')}}";
          data-fecha="{{ auth('usuario')->user()->usuariofotofechas[0]->fecha_nac->format('Y-m-d') }}" id="sideUser">
            {{ auth('usuario')->user()->mail; }}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard 
              </p>
            </a>
          </li>
          @can('verificarPrivilegio', 'VERUSR')
          <li class="nav-item">
            <a href="{{route('usuarios.index')}}" class="nav-link {{ Request::is('usuarios*') ? 'active' : '' }} ">
              <i class="fas fa-users"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li> 
          @endcan
          
          @can('verificarPrivilegio', 'VERCLI')
          <li class="nav-item">
            <a href="{{route('clientes.index')}}" class="nav-link {{ Request::is('clientes*') ? 'active' : '' }}">
              <i class="fas fa-user-alt"></i>
              <p>
                Clientes
              </p>
            </a>          
        </li> 
          @endcan
        
        @can('verificarPrivilegio', 'VERPAG')
        <li class="nav-item">
          <a href="{{route('pagos.index')}}" class="nav-link {{ Request::is('pagos*') ? 'active' : '' }}">
            <i class="fas fa-money-check-alt"></i>
            <p>
              Pagos
            </p>
          </a>
        </li>
        @endcan  
       
          @can('verificarPrivilegio', 'VERROL')
          <li class="nav-item">
            <a href="{{route('roles.index')}}" class="nav-link {{ Request::is('roles*') ? 'active' : '' }}">
              <i class="fas fa-user-tie"></i>
              <p>
                Roles
              </p>
            </a>          
        </li>
          @endcan
       
        @can('verificarPrivilegio', 'VERSUC')
        <li class="nav-item">
          <a href="{{route('sucursals.index')}}" class="nav-link {{ Request::is('sucursales*') ? 'active' : '' }}">
            <i class="fas fa-building"></i>
            <p>
              Sucursales
            </p>
          </a>          
      </li>
        @endcan
      
      @can('verificarPrivilegio', 'VERITM')
      <li class="nav-item">
        <a href="{{route('items.index')}}" class="nav-link {{ Request::is('items*') ? 'active' : '' }}">
        
          <i class="fas fa-medkit"></i>
          <p>
            Items
          </p>
        </a>          
    </li>
      @endcan  
      @can('verificarPrivilegio', 'MOVACT')
      <li class="nav-item">
        <a href="{{route('activos.index')}}" class="nav-link {{ Request::is('activos*') ? 'active' : '' }}">
        
          <i class="fas fa-truck-moving"></i>
          <p>
            Activos
          </p>
        </a>          
    </li>
      @endcan  
      @can('verificarPrivilegio', 'VERSRV')
      <li class="nav-item">
        <a href="{{route('servicios.index')}}" class="nav-link {{ Request::is('servicios*') ? 'active' : '' }}">
          <i class="fas fa-praying-hands"></i>
          <p>
            Servicios
          </p>
        </a>          
    </li>
      @endcan
      
    @can('verificarPrivilegio', 'VERPAQ')
    <li class="nav-item">
      <a href="{{route('paquetes.index')}}" class="nav-link {{ Request::is('paquetes*') ? 'active' : '' }}">
        <i class="fas fa-box-open"></i>
        <p>
          Paquetes
        </p>
      </a>          
  </li>
    @endcan
   
  @can('verificarPrivilegio', 'VERCPA')
  <li class="nav-item">
    <a href="#" class="nav-link {{ Request::is('compras*') ? 'active' : '' }} ">
      <i class="fas fa-sync"></i>
      <p>
        Compras
        <i class="right fas fa-angle-left"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      @can('verificarPrivilegio', 'INSCPA')
      <li class="nav-item">
        <a href="{{route('compras.create')}}" class="nav-link {{ Request::is('compras/create') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Nueva Compra</p>
        </a>
      </li>
      @endcan
      <li class="nav-item">
        <a href="{{route('compras.index')}}" class="nav-link {{ Request::is('compras') ? 'active' : '' }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Ver Compras</p>
        </a>
      </li>
    </ul>
  </li>
  @endcan

  @can('verificarPrivilegio', 'VERCOM')
  <li class="nav-item">
    <a href="{{route('comisions.index')}}" class="nav-link {{ Request::is('comisions*') ? 'active' : '' }}">
      <i class="fas fa-percent"></i>
      <p>
        Comisiones
      </p>
    </a>          
</li>
  @endcan
 
@can('verificarPrivilegio', 'VERCTT')
<li class="nav-item">
  <a href="{{route('contratos.index')}}" class="nav-link {{ Request::is('contratos*') ? 'active' : '' }}">
    <i class="fas fa-file-signature"></i>
    <p>
      Contratos
    </p>
  </a>          
</li>
@endcan

@can('verificarPrivilegio', 'All')
<li class="nav-item">
  <a href="{{route('reportes.index')}}" class="nav-link {{ Request::is('reportes*') ? 'active' : '' }}">
    <i class="fas fa-file-signature"></i>
    <p>
      Reportes
    </p>
  </a>          
</li>
@endcan


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>