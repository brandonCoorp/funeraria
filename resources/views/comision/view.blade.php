@extends('admin.layout.master')
@section('title','Comision-Ver')
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
          <h3 class="card-title">Ver Comision</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
      
          <div class="card-body">
            <div class="form-group">
                <label for="mail">Mail Usuario </label>
                <input type="text" value="{{old('mail', $comision->mail)}}" class="form-control " 
                 name="mail" id="mail" disabled required>
              </div>
              <div class="form-group">
                <label for="monto">Monto Bs. </label>
                <input type="text"  value="{{old('monto', $comision->monto.' Bs.')}}" class="form-control " 
                  name="monto" id="monto" disabled required>
              </div>
            
              <div class="form-group">
                <label>Selecione Estado</label>
                <select class="form-control" name="estado" id="estado" disabled required>         
                  <option value="1"
                  @if($comision->estado == 1)
                  selected
                  @endif
                  >Pendiente</option>
                  <option value="2"
                  @if($comision->estado == 2)
                  selected
                  @endif
                  >Pagado</option>
                  <option value="3"
                  @if($comision->estado == 3)
                  selected
                  @endif
                  >Observado</option>
                  <option value="4"
                  @if($comision->estado == 4)
                  selected
                  @endif
                  >Rechazado</option>
           
                </select>
              </div>




              <div class="form-group">
                <label for="nombre">Nombre Cliente </label>
                <input type="text"  value="{{old('nombre', 
                $compra->cliente->persona->nombre.' '.$compra->cliente->persona->apellido_paterno.' '.$compra->cliente->persona->apellido_materno)}}" class="form-control " 
                  name="nombre" id="nombre" disabled required>
              </div>
              <div class="form-group">
                <label for="paquete">Paquete </label>
                <input type="text"  value="{{old('paquete', $compra->paquete->nombre)}}" class="form-control " 
                  name="paquete" id="paquete" disabled required>
              </div>

              <div class="form-group">
                <label for="fecha">Fecha de Compra</label>
                <input type="text"  value="{{old('fecha', 
                $compra->fecha->format('d-m-Y'))}}" class="form-control " 
                  name="fecha" id="fecha" disabled required>
              </div>
              <div class="form-group">
                <label for="costoLabel" id="costoLabel">Precio TOTAL : {{$compra->costo}} Bs.</label>
              </div>  
          </div>
            
          <div class="card-footer">
            <a href="{{route('comisions.index')}}" class="btn btn-danger">volver</a>
          </div>
        
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


















