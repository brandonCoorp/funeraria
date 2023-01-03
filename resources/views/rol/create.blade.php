@extends('admin.layout.master')
@section('title','Rol-Crear')
@section('page-level-css')
<style type="text/css">
</style>  
@endsection
@section('content')
<!-- Content Header (Page header) -->

<!-- /.content-header -->
<section class="content">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Crear Rol') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('roles.store')}}" method="POST">
                      @csrf
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control"
                         value="{{old('nombre')}}" name="nombre" id="nombre" placeholder="nombre">
                      </div>

                      <div class="form-group">
                       <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="Descripcion"
                       rows="3">{{old('descripcion')}}</textarea>
                      </div>              
                      <hr>
                   <h3>Permsisos</h3>
                 @foreach ($permisos as $permiso)

                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" value="{{$permiso->id}}"
                        name="permiso[]" id="permiso_{{$permiso->id}}"
                        @if (is_array(old('permiso')) && in_array("$permiso->id", old('permiso')))
                        checked
                        @endif
                        >
                        <label class="custom-control-label" for="permiso_{{$permiso->id}}">
                            {{$permiso->id}}
                            -
                            {{$permiso->nombre}} : 
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