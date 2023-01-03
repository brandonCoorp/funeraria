@extends('admin.layout.master')
@section('title','Item-Editar')
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
                <div class="card-header"><h2>{{ __('Actualizar Item') }}</h2></div>

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
                        <label>Selecione Tipo</label>
                        <select class="form-control" name="tipo" id="tipo" required>         
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
                        <select class="form-control" name="estado" id="estado" required>         
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
                     
                      <hr>
 
         

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