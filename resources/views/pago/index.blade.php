@extends('admin.layout.master')
@section('title','Pagos-Listar')
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
        <h1 class="m-0">PAGOS</h1>
      </div><!-- /.col -->
   
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
              {{-- @can('tieneacceso', 'rol.create') --}}
                
                <a href="{{route('pagos.create')}}" 
                class="btn btn-primary float-right">Crear</a>
                <br><br> 
                {{-- @endcan --}}
             
                @include('Custom.mensaje')

<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>
    
       @foreach ($pagos as $pago)
       <tr>
       <th scope="row">{{$pago->id}}</th>
       <td>{{$pago->nombre}}</td>
       <td>{{$pago->descripcion}}</td>
      <td>
        {{-- @can('tieneacceso', 'rol.show') --}}
        <a class="btn btn-info" href="{{route('pagos.show',$pago->id)}}">Ver</a>
        {{-- @endcan --}}
      </td>  
      <td>
        {{-- @can('tieneacceso', 'rol.edit') --}}
        <a class="btn btn-success" href="{{route('pagos.edit',$pago->id)}}">Editar</a>
        {{-- @endcan --}}
      </td>  
      <td>
        {{-- @can('tieneacceso', 'rol.destroy') --}}
      <form action="{{route('pagos.destroy',$pago->id)}}" method="post">
      @csrf
      @method('DELETE')
        <button class="btn btn-danger">Eliminar</button>

      </form>
      {{-- @endcan --}}
      </td>  
       
      </tr>
       @endforeach
        
    </tbody>
  </table>
 {{ $pagos->links()}}

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