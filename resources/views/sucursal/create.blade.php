@extends('admin.layout.master')
@section('title','Sucursal-Crear')
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
                <div class="card-header"><h2>{{ __('Crear Sucursal') }}</h2></div>

                <div class="card-body">
                  @include('Custom.mensaje')

                    <form action="{{route('sucursals.store')}}" method="POST">
                      @csrf
                     <div class="containner">
                       <h3>Requisito de Datos</h3>
                       <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control"
                         value="{{old('nombre')}}" name="nombre" id="nombre" placeholder="nombre">
                      </div>

                      <div class="form-group">
                       <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion"
                        name="descripcion" placeholder="Descripcion"
                       rows="3">{{old('descripcion')}}</textarea>
                      </div>              
                      <div class="form-group">
                        <label>Telefono:</label>
      
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                          </div>
                          <input type="number" class="form-control"  value="{{old('telefono')}}" name="telefono" id="telefono">
                        </div>
                        <!-- /.input group -->
                      </div>
                      <div class="form-group">
                        <label>Direccion:</label>
      
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-home"></i></i></span>
                          </div>
                          <input type="text" class="form-control"  value="{{old('direccion')}}"  inputmode="text" name="direccion" id="direccion">
                        </div>
                        <!-- /.input group -->
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