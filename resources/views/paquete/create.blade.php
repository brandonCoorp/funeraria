@extends('admin.layout.master')
@section('title','Paquete-Crear')
@section('page-level-css')
<link rel="stylesheet" href="{{ asset('dist/css/funeraria/servicio.css')}}">
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
          <h3 class="card-title">Nuevo Paquete</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('paquetes.store')}}" method="POST" >
            @csrf
          <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" value="{{old('nombre')}}" class="form-control " name="nombre" id="nombre" required>
              </div>
              <div class="form-group">
                <label for="cod_paquete">Codigo </label>
                <input type="text" value="{{old('cod_paquete')}}" class="form-control "  name="cod_paquete" id="cod_paquete" required>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="Descripcion"
                       rows="3">{{old('descripcion')}}</textarea>
              </div>

         

            <div class="form-group">
                <label>Selecione Servicio</label>
                <select class="form-control" name="servicio_id" id="servicio_id" required>
                    
                    @foreach ($servicios as $servicio)  
                  <option class="option" id="option{{$servicio->id}}"value="{{$servicio->id}}"  
                data-costo="{{$servicio->costo}}" data-nombre="{{$servicio->nombre}}" data-codigo="{{$servicio->cod_servicio}}">
                {{$servicio->nombre}}</option>
                 
                  @endforeach
                </select>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="table-responsive">
            <table id="target" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
            </div>
            <div class="form-group">
              <label for="costoLabel" id="costoLabel">Precio TOTAL : 0 Bs.</label>
              <input type="number"  class="form-control invisible"  
               value="{{old('costo',0)}}" name="costo" id="costo" >
            </div>  
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
          </div>
        </form>
      </div>
        
       
    
</div>
</section>
@endsection
@section('page-level-script')

<script src="{{ asset('dist/js/funeraria/paquete.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection    


















