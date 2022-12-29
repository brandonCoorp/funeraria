@extends('admin.layout.master')
@section('title', 'Compra-Listar')
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
                    <h1 class="m-0">COMPRAS</h1>
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

                                <a href="{{ route('compras.create') }}" class="btn btn-primary float-right">Nueva Compra</a>


                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Fecha Compra</th>
                                        <th scope="col">Fecha Entrega</th>
                                        <th scope="col">Paquete</th>
                                        <th scope="col">Precio</th>
                                       
                                        <th colspan="1"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($compras as $compra)
                                        <tr>
                                            <th scope="row">{{ $compra->id }}</th>
                                            <td>{{ $compra->cliente->persona->nombre }} 
                                                {{ $compra->cliente->persona->apellido_paterno }} 
                                                {{ $compra->cliente->persona->apellido_materno }}</td>
                                            <td>{{ $compra->fecha->format('d/m/Y') }}</td>
                                            <td>{{ $compra->fecha_entrega->format('d/m/Y') }}</td>
                                            <td>{{ $compra->paquete->nombre }}</td>
                                            <td>{{ $compra->costo }} Bs.</td>
                                            
                                            <td>
                                                {{-- @can('tieneacceso', 'rol.show') --}}
                                                <a class="btn btn-info" href="{{ route('compras.show', $compra->id) }}">Ver</a>
                                                {{-- @endcan --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $compras->links() }}
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
