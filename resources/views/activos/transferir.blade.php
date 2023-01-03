@extends('admin.layout.master')
@section('title','Transeferir-Activo')
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
          <h3 class="card-title">Transferir A otra Sucursal</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('activos.savetransferir',['id' =>  $item->id])}}" method="POST">
            @csrf
        
          <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <p>{{$item->nombre}}</p>
             
              </div>
              <div class="form-group">
                <label for="cod_item">Codigo</label>
                <p>{{$item->cod_item}}</p>
    
              </div>
              <div class="form-group">
                <label for="cod_item">Stock en Origen</label>
                <p>{{$item->cantidad}}</p>

              </div>
              <div class="form-group">
                <label for="cod_item">Sucursal Origen</label>
                <p>{{$item->sucursal->nombre}}</p>

              </div>
              <div class="form-group">              
                <select class="form-control" name="sucursal_id" id="sucursal_id" >
                    <option selected value="0">Selecciona Sucursal Destino</option>
                    @foreach ($sucursals as $sucursal)  
                    @if($sucursal->id != $item->sucursal->id)
                  <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                 @endif
                  @endforeach
                </select>
            </div>  

              <div class="form-group">
                <label for="cantidad">Cantidad a Enviar</label>
                <input type="number"  min="1" max="{{$item->cantidad}}" class="form-control" 
                value="1" name="cantidad" id="cantidad" required >
              </div>            
              <hr>
           
          </div>
            
          <div class="card-footer">
            <button type="submit" class="btn btn-primary" >Guardar</button> 
          </div>
        </form>
      </div>
        
       
    
</div>
</section>
@endsection
@section('page-level-script')

<script src="{{ asset('dist/js/funeraria/servicio.js')}}"></script>
<script src="{{ asset('dist/js/funeraria/costo.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection    


















