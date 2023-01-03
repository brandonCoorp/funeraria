@extends('admin.layout.master')
@section('title','Item-Ver')
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
                <div class="card-header"><h2>{{ __('Ver Item') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                  
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" disabled
                        value="{{old('nombre', $item->nombre)}}" name="nombre" id="nombre" placeholder="nombre" required>
                      </div>
                      <div class="form-group">
                        <label for="cod_item">Codigo</label>
                        <input type="text" class="form-control" disabled
                        value="{{old('cod_item', $item->cod_item)}}" name="cod_item" id="cod_item" placeholder="COD01" required> 
                      </div>
                      <div class="form-group">
                       <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion" disabled
                        name="descripcion" placeholder="Descripcion" required
                       rows="3">{{old('descripcion', $item->descripcion)}}</textarea >
                      </div> 
                      <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number"  min="1"  class="form-control" disabled
                        value="{{old('cantidad', $item->cantidad)}}" name="cantidad" id="cantidad" required >
                      </div>
                   
                      <div class="form-group">
                        <label>Selecione Tipo</label>
                        <select class="form-control" name="tipo" id="tipo" disabled required>         
                          <option value="1"
                          @if($item->tipo == 1)
                          selected
                          @endif
                          >Prestamo</option>
                          <option value="2"
                          @if($item->tipo == 2)
                          selected
                          @endif
                          >Items de Venta</option>           
                        </select>
                      </div>
        


                      <div class="form-group">
                        <label>Selecione Estado</label>
                        <select class="form-control" name="estado" id="estado" disabled required>         
                          <option value="1"
                          @if($item->estado == 1)
                          selected
                          @endif
                          >Activo</option>
                          <option value="2"
                          @if($item->estado == 2)
                          selected
                          @endif
                          >Reservado</option>
                          <option value="3"
                          @if($item->estado == 3)
                          selected
                          @endif
                          >Dañado</option>
                          <option value="4"
                          @if($item->estado == 4)
                          selected
                          @endif
                          >Retirado</option>
                        </select>
                      </div>
        

                      <div class="form-group">
                        <label for="costo_unit">Costo Unitario</label>
                        <input type="number"  min="1"  class="form-control" required disabled
                        value="{{old('costo_unit', $item->costo_unit)}}" name="costo_unit" id="costo_unit" >
                      </div>             
                      <hr>
                      <h3>Sucursal</h3>   
                      <div class="form-group">        
                        <p>{{ $item->sucursal->nombre}}</p>
                    
                      </div> 
                  


                      <hr>
                      @can('verificarPrivilegio', 'MODITM') 
                      <a href="{{route('items.edit',$item->id)}}" class="btn btn-success">Editar</a>

                       @endcan 
                     
                    
                      <a href="{{route('items.index')}}" class="btn btn-danger">volver</a>
                    </div>


         
           
           
           
           
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