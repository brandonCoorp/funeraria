@extends('admin.layout.master')
@section('title', 'Item-Listar')
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
                    <h1 class="m-0">ITEMS</h1>
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

                                <a href="{{ route('items.create') }}" class="btn btn-primary float-right">Crear</a>


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
                                    @foreach ($items as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->cod_item }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->descripcion }}</td>
                                            <td>
                                                {{-- @can('tieneacceso', 'rol.show') --}}
                                                <a class="btn btn-info" href="{{ route('items.show', $item->id) }}">Ver</a>
                                                {{-- @endcan --}}
                                            </td>
                                            <td>
                                                {{-- @can('tieneacceso', 'rol.edit') --}}
                                                <a class="btn btn-success"
                                                    href="{{ route('items.edit', $item->id) }}">Editar</a>
                                                {{-- @endcan --}}
                                            </td>
                                            <td>
                                                {{-- @can('tieneacceso', 'rol.destroy') --}}
                                                <form action="{{ route('items.destroy', $item->id) }}" method="post">
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
                            {{ $items->links() }}
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
