@extends('admin.layout.master')
@section('title','Servicio-Crear')
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
          <h3 class="card-title">Nuevo Servicio</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('servicios.store')}}" method="POST" >
            @csrf
          <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" value="{{old('nombre')}}" class="form-control " name="nombre" id="nombre" required>
              </div>
              <div class="form-group">
                <label for="cod_servicio">Codigo </label>
                <input type="text" value="{{old('cod_servicio')}}" class="form-control "  name="cod_servicio" id="cod_servicio" required>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="Descripcion"
                       rows="3">{{old('descripcion')}}</textarea>
              </div>

         

            <div class="form-group">
                <label>Selecione Item</label>
                <select class="form-control" name="item_id" id="item_id" required>
                  
                    @foreach ($items as $item)  
                  <option class="option" id="option{{$item->id}}"value="{{$item->id}}"  
                data-costo="{{$item->costo_unit}}" data-nombre="{{$item->nombre}}" data-codigo="{{$item->cod_item}}">
                {{$item->nombre}}</option>
                 
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
                  <th>Cantidad</th>
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

<script src="{{ asset('dist/js/funeraria/servicio.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection    


















