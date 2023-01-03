@extends('admin.layout.master')
@section('title','Rol-Editar')
@section('page-level-css')
<style type="text/css">
</style>  
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">ROLES</h1>
      </div><!-- /.col -->
   
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Editar Rol') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')
                
                    <form action="{{route('roles.update',['role' =>  $rol->id])}}" method="POST">
                      @csrf
                      @method('PUT')
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="nombre">Nombre :</label>
                        <input type="text" class="form-control"
                         value="{{old('nombre', $rol->nombre)}}" name="nombre" id="nombre" placeholder="nombre">
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for="descripcion">Descripcion :</label>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="Descripcion"
                       rows="3">{{old('descripcion',$rol->descripcion)}}</textarea>
                      </div>
                      <hr>
                   <h3>Permsisos</h3>
                 @foreach ($permisos as $permiso)

                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="{{$permiso->id}}"
                        name="permiso[]" id="permiso_{{$permiso->id}}"
                        @if (is_array(old('permiso')) && in_array("$permiso->id", old('permiso')))
                        checked
                        @elseif (is_array($permiso_rol) && in_array("$permiso->id", $permiso_rol))
                        checked
                        @endif
                        >
                        <label class="custom-control-label" for="permiso_{{$permiso->id}}">
                            {{$permiso->id}}
                            -
                            {{$permiso->nombre}} :  {{$permiso->cod_permiso}} 
                            <em>{{$permiso->descripcion}}</em>    
                        </label>
                      </div>       
                  @endforeach


                      <hr>
                      <button type="submit" class="btn btn-primary" >Guardar</button> 
                    </div>


           </form>
           
           
           
           
                </div>
            </div>
        </div>
    </div>
</div>


</section>
@endsection
@section('page-level-script')
    <script type="text/javascript">

    </script>
@endsection