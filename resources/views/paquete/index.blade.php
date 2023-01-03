@extends('admin.layout.master')
@section('title', 'Paquete-Listar')
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
                    <h1 class="m-0">PAQUETES</h1>
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
                                @can('verificarPrivilegio', 'INSPAQ') 
                                <a href="{{ route('paquetes.create') }}" class="btn btn-primary float-right">Crear</a>
                                @endcan 
                               


                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripcion</th>
                                        <th colspan="3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paquetes as $paquete)
                                        <tr>
                                            <th scope="row">{{ $paquete->id }}</th>
                                            <td>{{ $paquete->cod_paquete }}</td>
                                            <td>{{ $paquete->nombre }}</td>
                                            <td>{{ $paquete->descripcion }}</td>
                                            <td>
                                                 @can('verificarPrivilegio', 'VERPAQ') 
                                                <a class="btn btn-info" href="{{ route('paquetes.show', $paquete->id) }}">Ver</a>
                                                 @endcan 
                                            </td>
                                            <td>
                                                 @can('verificarPrivilegio', 'MODPAQ') 
                                                <a class="btn btn-success"
                                                    href="{{ route('paquetes.edit', $paquete->id) }}">Editar</a>
                                                 @endcan 
                                            </td>
                                            <td>
                                                 @can('verificarPrivilegio', 'DELPAQ') 
                                                <form action="{{ route('paquetes.destroy', $paquete->id) }}" method="post">
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
                            {{ $paquetes->links() }}

                           
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            
        </div>
      
    </section>
@endsection
@section('page-level-script')
    <script type="text/javascript">

    </script>
@endsection



















