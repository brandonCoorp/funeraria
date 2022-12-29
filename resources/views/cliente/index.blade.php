@extends('admin.layout.master')
@section('title', 'Cliente-Listar')
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
                    <h1 class="m-0">CLIENTES</h1>
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


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Direccion</th>                      
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <th scope="row">{{ $cliente->id }}</th>
                                            <td>{{ $cliente->persona->nombre }} 
                                                {{ $cliente->persona->apellido_paterno }} 
                                                {{ $cliente->persona->apellido_materno }}</td>
                                            <td>{{ $cliente->telefono}}</td>
                                            <td>{{ $cliente->tipo }}</td>
                                            <td>{{ $cliente->persona->direccion }}</td>                                         
                                            <td>
                                                {{-- @can('tieneacceso', 'rol.show') --}}
                                                <a class="btn btn-info" href="{{ route('clientes.show', $cliente->id) }}">Ver</a>
                                                {{-- @endcan --}}
                                            </td>
                                            <td>
                                                {{-- @can('tieneacceso', 'rol.edit') --}}
                                                <a class="btn btn-success"
                                                    href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                                                {{-- @endcan --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $clientes->links() }}
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
    <script type="text/javascript"></script>
@endsection
