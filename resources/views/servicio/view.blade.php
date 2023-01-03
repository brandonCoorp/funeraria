@extends('admin.layout.master')
@section('title','Servicio-Ver')
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
          <h3 class="card-title">Ver Servicio</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
       
          <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" value="{{old('nombre', $servicio->nombre)}}" class="form-control " disabled
                 name="nombre" id="nombre" required>
              </div>
              <div class="form-group">
                <label for="cod_servicio">Codigo </label>
                <input type="text"  value="{{old('cod_servicio', $servicio->cod_servicio)}}" class="form-control " disabled
                  name="cod_servicio" id="cod_servicio" required>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="Descripcion" disabled
                       rows="3"> {{old('descripcion', $servicio->descripcion)}}</textarea>
              </div>

         

            <div class="form-group">
                <label>Selecione Item</label>
                <select class="form-control" name="item_id" id="item_id" required disabled>
                   
                    @foreach ($items as $item)  
                  <option  id="option{{$item->id}}" value="{{$item->id}}"  
                data-costo="{{$item->costo_unit}}" data-nombre="{{$item->nombre}}" data-codigo="{{$item->cod_item}}"
                @if (is_array(old('item_id')) && in_array("$item->id", old('item_id')))
                disabled ="disabled" class="option azul" 
                @elseif (is_array($item_id) && in_array("$item->id", $item_id))
                disabled ="disabled" class="option azul"
                @else
                class="option"
                @endif
                >
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
                 
                </tr>
              </thead>
              <tbody>
                @foreach ($itemservicios as $itemservicio)  
                <tr data-price="2000" id="tr17">
                    <td>{{$itemservicio->cod_item}}</td>
                    <td>{{$itemservicio->nombre}}</td>
                    <td class="td-price">{{$itemservicio->costo_unit * $itemservicio->pivot->cantidad}}</td>
                    <td><input type="number" required="" class="form-control open" name="cantidad[]"  disabled
                        value="{{$itemservicio->pivot->cantidad}}" min="1">
                        <input type="number"  hidden="none" name="itemsid[]" disabled value="{{$itemservicio->id}}" >
                    </td>
                  
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
            <div class="form-group">
              <label for="costo" id="costoLabel">Precio TOTAL : {{old('costo', $servicio->costo)}} Bs.</label>
              <input type="number"  min="1"  class="form-control" required
               value="{{old('costo', $servicio->costo)}}" name="costo" id="costo" hidden="none" >
            </div>  
          <div class="card-footer">
            @can('verificarPrivilegio', 'MODSRV') 
            <a href="{{route('servicios.edit',$servicio->id)}}" class="btn btn-success">Editar</a>
             @endcan 
           
                    
            <a href="{{route('servicios.index')}}" class="btn btn-danger">volver</a>
          </div>
      
      </div>
        
       
    
</div>
</section>
@endsection
@section('page-level-script')

<script src="{{ asset('dist/js/funeraria/servicio.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection    


















