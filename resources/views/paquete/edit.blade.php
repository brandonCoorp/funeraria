@extends('admin.layout.master')
@section('title','Paquete-Editar')
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
          <h3 class="card-title">Actualizar Paquete</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('paquetes.update', $paquete->id)}}" method="POST" >
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" value="{{old('nombre', $paquete->nombre)}}" class="form-control " 
                 name="nombre" id="nombre" required>
              </div>
              <div class="form-group">
                <label for="cod_paquete">Codigo </label>
                <input type="text"  value="{{old('cod_paquete', $paquete->cod_paquete)}}" class="form-control " 
                  name="cod_paquete" id="cod_paquete" required>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="Descripcion" 
                       rows="3"> {{old('descripcion', $paquete->descripcion)}}</textarea>
              </div>

         

            <div class="form-group">
                <label>Selecione Servicio</label>
                <select class="form-control" name="servicio_id" id="servicio_id" required >
                    
                    @foreach ($servicios as $servicio)  
                  <option  id="option{{$servicio->id}}" value="{{$servicio->id}}"  
                data-costo="{{$servicio->costo}}" data-nombre="{{$servicio->nombre}}" data-codigo="{{$servicio->cod_servicio}}"
                @if (is_array(old('servicio_id')) && in_array("$servicio->id", old('servicio_id')))
                  class="option azul" @disabled(true)
                @elseif (is_array($servicio_id) && in_array("$servicio->id", $servicio_id))
                  class="option azul" @disabled(true)
                @else
                class="option"
                @endif
                >
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
                @foreach ($paqueteservicios as $paqueteservicio)  
                <tr data-price="{{$paqueteservicio->costo}}" id="tr{{$paqueteservicio->id}}">
                    <td>{{$paqueteservicio->cod_servicio}}</td>
                    <td>{{$paqueteservicio->nombre}}</td>
                    <td class="td-price">Bs. {{$paqueteservicio->costo}}
                        <input type="number"  hidden="none" name="serviciosid[]"  value="{{$paqueteservicio->id}}" >
                    </td>  
                    <td><button class="btn btn-xs btn-danger btn-eliminar" >Descartar</button></td>         
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
            <div class="form-group">
              <label for="costo" id="costoLabel">Precio TOTAL : {{old('costo', $paquete->costo)}} Bs.</label>
              <input type="number"   class="form-control invisible" 
               value="{{old('costo', $paquete->costo)}}" name="costo" id="costo" >
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

<script src="{{ asset('dist/js/funeraria/paquete.js')}}"></script>
<script src="{{ asset('dist/js/funeraria/costo.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection    


















