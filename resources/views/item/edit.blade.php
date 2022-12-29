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

                    <form action="{{route('items.update' ,$item->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" 
                        value="{{old('nombre', $item->nombre)}}" name="nombre" id="nombre" placeholder="nombre" required>
                      </div>
                      <div class="form-group">
                        <label for="cod_item">Codigo</label>
                        <input type="text" class="form-control" 
                        value="{{old('cod_item', $item->cod_item)}}" name="cod_item" id="cod_item" placeholder="COD01" required> 
                      </div>
                      <div class="form-group">
                       <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion" 
                        name="descripcion" placeholder="Descripcion" required
                       rows="3">{{old('descripcion', $item->descripcion)}}</textarea >
                      </div> 
                      <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number"  min="1"  class="form-control" 
                        value="{{old('cantidad', $item->cantidad)}}" name="cantidad" id="cantidad" required >
                      </div>
                      <div class="form-group">
                        <label for="tipo">Tipo:</label><br>
                        <p> 1.-Movilidad  2.-Decoracion  3.-Productos venta  4.-Mano de obra</p>
                        <input type="numeber" min="1" max="4" class="form-control" required 
                        value="{{old('tipo', $item->tipo)}}" name="tipo" id="tipo" >
                      </div>
                      <div class="form-group">
                        <label for="estado">Estado</label><br>
                        <p> 1.-En Uso  2.-Reservado  3.-Dañado  4.-Retirado</p> 
                        <input type="number"  min="1" max="4" class="form-control" required 
                        value="{{old('estado', $item->estado)}}" name="estado" id="estado" >
                      </div>
                      <div class="form-group">
                        <label for="costo_unit">Costo Unitario</label>
                        <input type="number"  min="1"  class="form-control" required 
                        value="{{old('costo_unit', $item->costo_unit)}}" name="costo_unit" id="costo_unit" >
                      </div>             
                      <hr>
                   <h3>Sucursal</h3>     
                      <div class="form-group">
                       
                        <select class="form-control" name="sucursal_id" id="sucursal_id" required >
                            <option selected value="0">Seleccionar</option>
                            @foreach ($sucursals as $sucursal)  
                          <option value="{{$sucursal->id}}"
                            @if (old('sucursal_id') == $sucursal->id)
                            selected
                        @elseif ($item->sucursal_id == $sucursal->id)
                            selected
                            @endif
                            >{{$sucursal->nombre}}</option>
                         
                          @endforeach
                        </select>
                      </div>
                  


                      <hr>
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Editar</button>
                      </div>
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