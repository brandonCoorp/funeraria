@extends('admin.layout.master')
@section('title','Cliente-Editar')
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
          <h3 class="card-title">Editar CLiente</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('clientes.update', $cliente->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="card-body">
            <div class="form-group">
                <label for="nombre">Nombre </label>
                <input type="text" class="form-control form-control-border" 
                value="{{old('nombre', $cliente->persona->nombre)}}" name="nombre" id="nombre" required>
              </div>
              <div class="form-group">
                <label for="apellido_paterno">Apellido Paterno</label>
                <input type="text" class="form-control form-control-border" 
                value="{{old('apellido_paterno', $cliente->persona->apellido_paterno)}}" name="apellido_paterno" id="apellido_paterno" required>
              </div>
              <div class="form-group">
                <label for="apellido_materno">Apellido Materno </label>
                <input type="text" class="form-control form-control-border" 
                value="{{old('apellido_materno', $cliente->persona->apellido_materno)}}" name="apellido_materno" id="apellido_materno" required>
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-house-user"></i></span>
                </div>
                <input type="text" class="form-control" name="direccion" 
                value="{{old('direccion', $cliente->persona->direccion)}}" placeholder="Direccion" required>
              </div>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="fas fa-phone"></i></span>
                </div>
                <input type="number" class="form-control"  value="{{old('telefono', $cliente->telefono)}}" name="telefono" id="telefono" required>
              </div>
          </div>
          <!-- /.card-body -->
    
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Editar</button>
          </div>
        </form>
      </div>

  
    

 
    
</div>
</section>
@endsection
@section('page-level-script')
 
    <script type="text/javascript">
    </script>
@endsection    


















