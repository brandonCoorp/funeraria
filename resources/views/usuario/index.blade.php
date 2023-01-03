@extends('admin.layout.master')
@section('title','Usuario-Listar')
@section('page-level-css')
<style type="text/css">
</style>  
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    
   
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<section class="content">

<div class="container-fluid">
   
        
              @can('verificarPrivilegio', 'INSUSR') 
              <a href="{{route('usuarios.create')}}" 
              class="btn btn-primary float-right">Nuevo Usuario</a>
               @endcan 
               
                <br><br> 
              
             
                @include('Custom.mensaje')

<!-- Default box -->
<div class="card card-solid">
    <div class="card-body pb-0">
      <div class="row">


          @foreach ($usuarios as $usuario)

        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
          <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
              {{$usuario->role->nombre}}
            </div>
            <div class="card-body pt-0">
              <div class="row">
                <div class="col-7">
                  <h2 class="lead"><b>{{$usuario->persona->nombre}} {{$usuario->persona->apellido_paterno}} {{$usuario->persona->apellido_materno}}</b></h2>
                  <p class="text-muted text-sm"><b>Mail: </b>{{$usuario->mail}} </p>
                  <ul class="ml-4 mb-0 fa-ul text-muted">
                    <li class="small"><span class="fa-li"><i class="fas fa-home"></i></span> Direccion : {{$usuario->persona->direccion}}</li>
                    <li class="small"><span class="fa-li"><i class="fas fa-birthday-cake"></i></span> Fecha_Naci :  {{$usuario->usuariofotofechas[0]->fecha_nac->format('d-m-Y')}} </li>
                  </ul>
                </div>
                <div class="col-5 text-center">
                  <img src="{{ asset($usuario->usuariofotofechas[0]->foto)}}" alt="user-avatar" class="img-circle img-fluid">
                </div>
              </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4">
                      @can('verificarPrivilegio', 'MODUSR') 
                      <a href="{{route('usuarios.edit',$usuario->id)}}" class="btn btn-sm btn-primary">
                        <i class="fas fa-user"></i> Editar
                      </a>
                       @endcan 
                        
                    </div>
                    
                    <div class="col-md-2">
                      @can('verificarPrivilegio', 'DELUSR') 
                      <form action="{{route('usuarios.destroy',$usuario->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                          <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                       @endcan 
                       
                    </div>           
                  </div>
              
            </div>
          </div>
        </div>
      
        @endforeach

      </div>
    </div>
    <div class="card-footer pagination justify-content-center m-0">
     
      {{ $usuarios->links()}}
    </div>
    <!-- /.card-footer -->
  </div>
  <!-- /.card -->

 
</section>

@endsection
@section('page-level-script')
    <script type="text/javascript">

    </script>
@endsection