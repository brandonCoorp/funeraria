@extends('admin.layout.master')
@section('title','Compra-Crear')
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
          <h3 class="card-title">Nueva Compra</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('compras.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="card-body">
            <h2>Datos Cliente</h2>
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" class="form-control form-control" name="nombre" id="nombre" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" class="form-control form-control"  name="apellido_paterno" id="apellido_paterno" required>
              </div>
              <div class="form-group">
                <label for="apellido_materno">Apellido Materno </label>
                <input type="text" class="form-control form-control"  name="apellido_materno" id="apellido_materno" required>
              </div>
              <label>Direccion de la Entrega:</label>
              <div class="input-group mb-3">
              
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                </div>
                <input type="text" class="form-control" name="direccion"  id="direccion" placeholder="Direccion" required>
                <input type="number" class="form-control form-control "  name="cliente_id" id="cliente_id" hidden="none">
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="number" class="form-control"  value="{{old('telefono')}}" name="telefono" id="telefono">
              </div>
              <div class="form-group">
                <label>Fecha de la Entrega:</label>            
                <div class="input-group date" id="datepicker">
                    <input type="text" class="form-control"  name="fecha"   autocomplete="off"
                     min="2023-01-01" max="2100-01-01" required>
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
                <select class="form-control" name="paquete" id="paquete" required>
                    <option selected value="0">Seleccionar</option>
                    @foreach ($paquetes as $paquete)  
                  <option value="{{$paquete->id}}" id="option{{$paquete->id}}"
                    data-costo="{{$paquete->costo}}" data-nombre="{{$paquete->nombre}}" data-codigo="{{$paquete->cod_paquete}}"
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
                  </tbody>
                </table>
                </div>
                <div class="form-group">
                  <label for="costoLabel" id="costoLabel">Precio TOTAL : 0 Bs.</label>
                </div>  
                

             <h2>Tipo de Pago</h2>
            <div class="form-group">
                <label>Selecione Pago</label>
                <select class="form-control" name="pago" id="pago" required>
                    <option selected value="0">Seleccionar</option>
                    @foreach ($pagos as $pago)  
                  <option value="{{$pago->id}}">{{$pago->nombre}}</option>
                 
                  @endforeach
                </select>
              </div>
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Registrar</button>
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


















