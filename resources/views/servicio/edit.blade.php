@extends('admin.layout.master')
@section('title','Servicio-Editar')
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
          <h3 class="card-title">Actualizar Servicio</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('servicios.update',['servicio' =>  $servicio->id])}}" method="POST">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" value="{{old('nombre', $servicio->nombre)}}" class="form-control " 
                 name="nombre" id="nombre" required>
              </div>
              <div class="form-group">
                <label for="cod_servicio">Codigo </label>
                <input type="text"  value="{{old('cod_servicio', $servicio->cod_servicio)}}" class="form-control " 
                  name="cod_servicio" id="cod_servicio" required>
              </div>
              <div class="form-group">
                <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="Descripcion" 
                       rows="3"> {{old('descripcion', $servicio->descripcion)}}</textarea>
              </div>

         

            <div class="form-group">
                <label>Selecione Item</label>
                <select class="form-control" name="item_id" id="item_id" required >
                  
                    @foreach ($items as $item)  
                  <option  id="option{{$item->id}}" value="{{$item->id}}"  
                data-costo="{{$item->costo_unit}}" data-nombre="{{$item->nombre}}" data-codigo="{{$item->cod_item}}"
                @if (is_array(old('item_id')) && in_array("$item->id", old('item_id')))
                  class="option azul"  @disabled(true)
                @elseif (is_array($item_id) && in_array("$item->id", $item_id))
                 class="option azul" @disabled(true)
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
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($itemservicios as $itemservicio)  
                <tr data-price="{{$itemservicio->costo_unit}}" id="tr{{$itemservicio->id}}">
                    <td>{{$itemservicio->cod_item}}</td>
                    <td>{{$itemservicio->nombre}}</td>
                    <td class="td-price">Bs. {{$itemservicio->costo_unit * $itemservicio->pivot->cantidad}}</td>
                    <td><input type="number" required="" class="form-control open precio-input" name="cantidad[]" 
                        value="{{$itemservicio->pivot->cantidad}}" min="1" >
                        <input type="number" required="" hidden="none" name="itemsid[]"  value="{{$itemservicio->id}}" min="1">
                    </td>
                    <td><button class="btn btn-xs btn-danger btn-eliminar" >Descartar</button></td>
                </tr>
                @endforeach
              </tbody>
            </table>
            </div>
            <div class="form-group">
              <label for="costoLabel" id="costoLabel">Precio TOTAL : {{$servicio->costo}} Bs.</label>
              <input type="number"    class="form-control invisible " 
               value="{{$servicio->costo}}" name="costo" id="costo"  >
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


















