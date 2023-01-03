@extends('admin.layout.master')
@section('title','Usuario-Editar')
@section('page-level-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
<link rel="stylesheet" href="{{ asset('dist/css/funeraria/usuario.css')}}">
<style type="text/css">
</style>  
@endsection
@section('content')
<!-- Content Header (Page header) -->
<hr>
<!-- /.content-header -->
<section class="content">

<div class="container-fluid">
    @include('Custom.mensaje')
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Editar Usuario </h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('usuarios.update', $usuario->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" class="form-control form-control-border" 
                value="{{old('nombre', $persona->nombre)}}" name="nombre" id="nombre" required>
              </div>
              <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" class="form-control form-control-border" 
                value="{{old('apellido_paterno', $persona->apellido_paterno)}}" name="apellido_paterno" id="apellido_paterno" required>
              </div>
              <div class="form-group">
                <label for="apellido_materno">Apellido Materno </label>
                <input type="text" class="form-control form-control-border" 
                value="{{old('apellido_materno', $persona->apellido_materno)}}" name="apellido_materno" id="apellido_materno" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                </div>
                <input type="text" class="form-control" name="direccion" 
                value="{{old('direccion', $persona->direccion)}}" placeholder="Direccion" required>
              </div>
             
              <div class="form-group">
                <label>Fecha de Nacimiento:</label>            
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control"  name="fecha_nac" 
                    value="{{old('fecha_nac', $usuario->usuariofotofechas[0]->fecha_nac->format('d-m-Y'))}}" min="1921-01-01" max="2023-01-01" required>
                    <span class="input-group-append">
                    <span class="input-group-text bg-white d-block">
                    <i class="fa fa-calendar"></i>
                    </span>
                    </span>
                </div>                 
              </div>
             
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                </div>
                <input type="email" class="form-control" name="mail"
                value="{{old('mail', $usuario->mail)}}"  placeholder="email@dominio.com" required> 
              </div>
            <div class="form-group">
              <label for="password">Contraseña</label>
              <input type="password" class="form-control"  name="password"
               id="password" placeholder="Password" >
            </div>
            <div class="form-group">
              <label for="foto">Foto Perfil</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="foto" name="foto"
                   accept="image/png,image/jpeg,image/jpg,image/jfif">
                  <label class="custom-file-label" for="foto">Selecione Foto de Perfil</label>
                </div>
                <div class="input-group-append">
                  <span class="input-group-text">Subir</span>
                </div>
              </div>
            </div>
            <div class="form-group foto-perfil">
                <img id="blah" src="{{ asset($usuario->usuariofotofechas[0]->foto)}}" alt="your image"  width="200px"/>
            </div>
            @can('verificarPrivilegio', 'MODROL') 
            <div class="form-group">
              <label>Selecione Rol</label>
              <select class="form-control" name="rol" id="rol" >
                  @foreach ($roles as $rol)  
                <option value="{{$rol->id}}"
                  @if (old('permiso') == $rol->id)
                      selected
                  @elseif ($usuario->role_id == $rol->id)
                      selected
                      @endif
                  
                  >{{$rol->nombre}}</option>
               
                @endforeach
              </select>
            </div>
             @endcan
             <div class="form-group">
              <label for="role">Rol </label>
              <p>{{ $usuario->role->nombre}}</p>
             
              <input type="text" class="form-control form-control-border invisible" 
              value="{{old('role', $usuario->role->id)}}" name="rolid" id="rolid" >
            </div> 
         


          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
          </div>
        </form>
      </div>

  
    

 
    
</div>
</section>
@endsection
@section('page-level-script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="{{ asset('dist/js/usuario.js')}}"></script>
 
    <script type="text/javascript">
     $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5'
        });
    </script>
@endsection    


















