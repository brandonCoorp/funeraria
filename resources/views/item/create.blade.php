@extends('admin.layout.master')
@section('title','Item-Crear')
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
                <div class="card-header"><h2>{{ __('Crear Item') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('items.store')}}" method="POST">
                      @csrf
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control"
                         value="{{old('nombre')}}" name="nombre" id="nombre" placeholder="nombre" required>
                      </div>
                      <div class="form-group">
                        <label for="cod_item">Codigo</label>
                        <input type="text" class="form-control"
                         value="{{old('cod_item')}}" name="cod_item" id="cod_item" placeholder="COD01" required> 
                      </div>
                      <div class="form-group">
                       <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="Descripcion" required
                       rows="3">{{old('descripcion')}}</textarea >
                      </div> 
                      <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number"  min="1"  class="form-control"
                         value="{{old('cantidad')}}" name="cantidad" id="cantidad" required >
                      </div>
                      <div class="form-group">
                        <label for="tipo">Tipo:</label><br>
                        <p> 1.-Prestamo  2.-Items de venta </p>
                        <input type="numeber" min="1" max="4" class="form-control" required
                         value="{{old('tipo')}}" name="tipo" id="tipo" >
                      </div>
                      <div class="form-group">
                        <label for="estado">Estado</label><br>
                        <p> 1.-Activo  2.-Reservado  3.-Dañado  4.-Retirado</p>
                        <input type="number"  min="1" max="4" class="form-control" required
                         value="{{old('estado')}}" name="estado" id="estado" >
                      </div>
                      <div class="form-group">
                        <label for="costo_unit">Costo Unitario</label>
                        <input type="number"  min="1"  class="form-control" required
                         value="{{old('costo_unit')}}" name="costo_unit" id="costo_unit" >
                      </div>             
                      <hr>
                   <h3>Sucursal</h3>     
                      <div class="form-group">
                       
                        <select class="form-control" name="sucursal_id" id="sucursal_id" required>
                            <option selected value="0">Seleccionar</option>
                            @foreach ($sucursals as $sucursal)  
                          <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                         
                          @endforeach
                        </select>
                      </div>
                  


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