@extends('admin.layout.master')
@section('title','Contrato-Editar')
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
          <h3 class="card-title">Actualizar Contrato</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('contratos.update',['contrato' =>  $contrato->id])}}" method="POST">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label for="mail">Motivo de Contrato </label>
                <input type="text" value="{{old('mail', 'Compra de '.$contrato->motivo)}}" class="form-control " 
                 name="mail" id="mail" disabled required>
              </div>
              <div class="form-group">
                <label for="monto">Monto Bs. </label>
                <input type="text"  value="{{old('monto', $contrato->monto.' Bs.')}}" class="form-control " 
                  name="monto" id="monto" disabled required>
              </div>
              <div class="form-group">
                <label for="estado">Estado </label>
                <p>1.-Pendiente 2.-Entregado 3.-Observado 4.-Rechazado</p>
                <input type="number" min="1" max="4" value="{{old('estado', $contrato->estado)}}" class="form-control " 
                  name="estado" id="estado"  required>
              </div>
         
              <div class="form-group">
                <label for="nombre">Nombre Cliente </label>
                <input type="text"  value="{{old('nombre', 
                $contrato->cliente->persona->nombre.' '.$contrato->cliente->persona->apellido_paterno.' '.$contrato->cliente->persona->apellido_materno)}}" class="form-control " 
                  name="nombre" id="nombre" disabled required>
              </div>
              <div class="form-group">
                <label for="fecha">Fecha de Compra</label>
                <input type="text"  value="{{old('fecha', 
                $contrato->compra->fecha->format('d-m-Y'))}}" class="form-control " 
                  name="fecha" id="fecha" disabled required>
              </div>
              <div class="form-group">
                <label for="costoLabel" id="costoLabel">Precio TOTAL : {{$contrato->monto}} Bs.</label>
              </div>  
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


















