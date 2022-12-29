@extends('admin.layout.master')
@section('title','Compra-Ver')
@section('page-level-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"/>
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
          <h3 class="card-title">Ver Compra</h3>
        </div><hr>
        <div class="card-tools">

          <a href="{{ route('items.create') }}" class="btn btn-success float-right">Ver Contrato de Compra</a>


      </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="#" method="POST">
            @csrf
          <div class="card-body">
            <h2>Datos Cliente</h2>
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" class="form-control form-control" name="nombre" id="nombre" 
                value="{{old('nombre', $compra->cliente->persona->nombre)}}" autocomplete="off"   disabled required>
              </div>
              <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" class="form-control form-control"  name="apellido_paterno"
                value="{{old('nombre', $compra->cliente->persona->apellido_paterno)}}" id="apellido_paterno"  disabled required>
              </div>
              <div class="form-group">
                <label for="apellido_materno">Apellido Materno </label>
                <input type="text" class="form-control form-control"  name="apellido_materno"
                value="{{old('nombre', $compra->cliente->persona->apellido_materno)}}" id="apellido_materno"  disabled required>
              </div>
              <label>Direccion de la Entrega:</label>
              <div class="input-group mb-3">
              
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                </div>
                <input type="text" class="form-control" name="direccion"  id="direccion" 
                value="{{old('direccion', $compra->cliente->persona->direccion)}}" placeholder="Direccion"  disabled required>
                <input type="number" class="form-control form-control " 
                 value="{{old('cliente_id', $compra->cliente->id)}}" name="cliente_id" id="cliente_id" hidden="none">
              </div>
              <div class="form-group">
                <label>Fecha de la Entrega:</label>            
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control"  name="fecha"   autocomplete="off"
                    value="{{old('fecha', $compra->fecha_entrega->format('d-m-Y'))}}"
                     min="2023-01-01" max="2100-01-01"  disabled required>
                    <span class="input-group-append">
                    <span class="input-group-text bg-white d-block">
                    <i class="fa fa-calendar"></i>
                    </span>
                    </span>
                </div>                 
              </div>

             
             <h2>Paquete</h2>
             <div class="form-group">
                <label>Selecione Paquete</label>
                <select class="form-control" name="paquete" id="paquete"  disabled required>
                    @foreach ($paquetes as $paquete)  
                  <option value="{{$paquete->id}}" id="option{{$paquete->id}}"
                    data-costo="{{$paquete->costo}}" data-nombre="{{$paquete->nombre}}" data-codigo="{{$paquete->cod_paquete}}"
                    @if (old('paquete') == $paquete->id)
                    selected
                @elseif ($compra->paquete_id == $paquete->id)
                    selected
                    @endif
                    >{{$paquete->nombre}}</option>
                 
                  @endforeach
                </select>
              </div>
              <div class="table-responsive">
                <table id="target" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Nombre</th>
                      <th>Precio</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($servicios as $servicio)  
                <tr data-price="{{$servicio->costo}}" id="tr{{$servicio->id}}">
                    <td>{{$servicio->cod_servicio}}</td>
                    <td>{{$servicio->nombre}}</td>
                    <td class="td-price">{{$servicio->costo}}
                    
                    </td>           
                </tr>
                @endforeach
                  </tbody>
                </table>
                </div>
                <div class="form-group">
                  <label for="costoLabel" id="costoLabel">Precio TOTAL : {{$compra->costo}} Bs.</label>
                </div>  
                

             <h2>Tipo de Pago</h2>
            <div class="form-group">
                <label>Selecione Pago</label>
                <select class="form-control" name="pago" id="pago"  disabled required>
                    @foreach ($pagos as $pago)  
                  <option value="{{$pago->id}}"
                    @if (old('pago') == $pago->id)
                    selected
                @elseif ($compra->pago_id == $pago->id)
                    selected
                    @endif
                    >{{$pago->nombre}}</option>
                 
                  @endforeach
                </select>
              </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
      
          </div>
        </form>
      </div>

  
    

 
    
</div>
</section>
@endsection
@section('page-level-script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<script src="{{ asset('dist/js/usuario.js')}}"></script>
<script src="{{ asset('dist/js/funeraria/compra.js')}}"></script>

    <script type="text/javascript">
     $('#datepicker').datepicker({
            uiLibrary: 'bootstrap5'
        });
    </script>
@endsection    


















