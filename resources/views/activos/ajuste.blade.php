@extends('admin.layout.master')
@section('title','Ajustar-Activo')
@section('page-level-css')

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
          <h3 class="card-title">Ajustar Item</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('activos.saveajuste',['id' =>  $item->id])}}" method="POST">
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
                <p id="item_cantidad">{{$item->cantidad}}</p>
                <input type="number"    class="form-control" 
                value="{{$item->cantidad}}" name="item_cant" id="item_cant" hidden="none">
                <input type="number"    class="form-control" 
                value="0" name="item_precio" id="item_precio" hidden="none">
                <input type="number"   class="form-control" 
                value="0" name="cant_final" id="cant_final" hidden="none">
              </div>
              <div class="form-group">
                <label for="cod_item">Precio Actual</label>
                <p>{{$item->costo_unit}} Bs.</p>
                <input type="number"    class="form-control" 
                value="{{$item->costo_unit}}" name="costo_unit" id="costo_unit" hidden="none">
              </div>
              <div class="form-group">
                <label for="cod_item">Sucursal Origen</label>
                <p>{{$item->sucursal->nombre}}</p>

              </div>
              <h4>Tipo de Ajuste</h4>
              <div class="form-group">              
                <select class="form-control" name="ajuste" id="ajuste" >
                    <option selected value="0">Seleccionar Ajuste</option>
                    <option  value="1">Ajuste de Faltantes</option>
                    <option  value="2">Ingreso Compra de Item</option>
                    <option  value="3">Productos Dañados</option>
                    <option  value="4">Excedentes de Item</option>
                   
                </select>
            </div>  
            <div class="form-group" id="input_ajuste">

              </div>
              <div class="form-group">
                <label for="cod_item">Stock Ajustado Final</label>
                <p id="stock_final">{{$item->cantidad}}</p>

              </div>
              <div class="form-group">
                <label for="cod_item">Precio Ajustado Final</label>
                <p id="precio_final">{{$item->costo_unit}}</p>

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

<script src="{{ asset('dist/js/funeraria/activo.js')}}"></script>
    <script type="text/javascript">

    </script>
@endsection    


















