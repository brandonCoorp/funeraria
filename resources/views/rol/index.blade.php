@extends('admin.layout.master')
@section('title','Roles-Listar')
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
        <h1 class="m-0">ROLES</h1>
      </div><!-- /.col -->
   
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
        <div class="card">
            @include('Custom.mensaje')

            <div class="card-header">


                <div class="card-tools">
                  @can('verificarPrivilegio', 'INSROL') 
                  <a href="{{ route('roles.create') }}" class="btn btn-primary float-right">Crear</a>
                   @endcan 
                    


                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
               
<table class="table table-hover text-nowrap">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Descripcion</th>
        <th colspan="3"></th>
      </tr>
    </thead>
    <tbody>
    
       @foreach ($roles as $rol)
       <tr>
       <th scope="row">{{$rol->id}}</th>
       <td>{{$rol->nombre}}</td>
       <td>{{$rol->descripcion}}</td>
      <td>
         @can('verificarPrivilegio', 'VERROL') 
        <a class="btn btn-info" href="{{route('roles.show',$rol->id)}}">Ver</a>
         @endcan 
      </td>  
      <td>
         @can('verificarPrivilegio', 'MODROL') 
        <a class="btn btn-success" href="{{route('roles.edit',$rol->id)}}">Editar</a>
         @endcan 
      </td>  
      <td>
         @can('verificarPrivilegio', 'DELROL') 
      <form action="{{route('roles.destroy',$rol->id)}}" method="post">
      @csrf
      @method('DELETE')
        <button class="btn btn-danger">Eliminar</button>

      </form>
       @endcan 
      </td>  
       
      </tr>
       @endforeach
        
    </tbody>
  </table>
 {{ $roles->links()}}

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