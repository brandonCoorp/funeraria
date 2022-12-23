@extends('admin.layout.master')
@section('title','Sucursal-Ver')
@section('page-level-css')
<style type="text/css">
</style>  
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">SUCURSAL</h1>
      </div><!-- /.col -->
   
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>{{ __('Vista Datos Sucursal') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('sucursals.update', $sucursal->id)}}" method="POST">
                      @csrf
                      @method('PUT')
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input disabled type="text" class="form-control"
                         value="{{old('nombre', $sucursal->nombre)}}" name="nombre" id="nombre" placeholder="nombre">
                      </div>
                      <hr>
                      <div class="form-group">
                        <label for="nombre">Descripcion</label>
                        <textarea class="form-control" id="descripcion" disabled
                        name="descripcion" placeholder="Descripcion"
                       rows="3">{{old('descripcion',$sucursal->descripcion)}}</textarea>
                      </div> 
                      <div class="form-group">
                        <label>Telefono:</label>
      
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <input disabled type="number" class="form-control"  value="{{old('telefono', $sucursal->telefono)}}" name="telefono" id="telefono">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                        <label>Direccion:</label>
      
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-home"></i></i></span>
                          </div>
                          <input disabled type="text" class="form-control" value="{{old('direccion', $sucursal->direccion)}}" inputmode="text" name="direccion" id="direccion">
                        </div>
                        <!-- /.input group -->
                      </div>      
                      <hr>
                    <a href="{{route('sucursals.edit',$sucursal->id)}}" class="btn btn-success">Editar</a>
                    
                    <a href="{{route('sucursals.index')}}" class="btn btn-danger">volver</a>
                    
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