@extends('admin.layout.master')
@section('title', 'Comisiones-Listar')
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
                    <h1 class="m-0">Comisiones</h1>
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
                                        <th scope="col">Usuario Mail</th>
                                        <th scope="col">Porcentaje de Venta</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Id de la Compra</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comisions as $comision)
                                        <tr>
                                            <th scope="row">{{ $comision->id }}</th>
                                            <td>{{ $comision->mail }}</td>
                                            <td>{{ $comision->monto }} Bs.</td>
                                            <td>
                                                
                                                @if ($comision->estado == 1)
                                                <span class="badge badge-success">Pendiente</span>
                                              @elseif ($comision->estado == 2)
                                              <span class="badge badge-info">Pagado</span>
                                               @elseif ($comision->estado == 3)
                                               <span class="badge badge-warning">Observado</span>
                                               @elseif ($comision->estado == 4)
                                               <span class="badge badge-danger">Rechazado</span>
                                              @endif
                                            </td>
                                            <td>{{ $comision->compra_id }}</td>
                                            <td>
                                                 @can('verificarPrivilegio', 'VERCOM') 
                                                <a class="btn btn-info" href="{{route('comisions.show',$comision->id)}}">Ver</a>
                                                 @endcan 
                                              </td> 
                                            <td>
                                                 @can('verificarPrivilegio', 'MODCOM') 
                                                <a class="btn btn-success"
                                                    href="{{ route('comisions.edit', $comision->id) }}">Editar</a>
                                                 @endcan 
                                            </td>
                                           

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $comisions->links() }}
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
