@extends('admin.layout.master')
@section('title', 'Contrato-Listar')
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
                    <h1 class="m-0">Contratos</h1>
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
                                        <th scope="col">Nombre Cliente</th>
                                        <th scope="col">Motivo</th>
                                        <th scope="col">Estado</th>    
                                        <th scope="col">Id de la Compra</th>
                                        <th colspan="2"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contratos as $contrato)
                                        <tr>
                                            <th scope="row">{{ $contrato->id }}</th>
                                            <td>{{$contrato->cliente->persona->nombre.' '.$contrato->cliente->persona->apellido_paterno.' '.$contrato->cliente->persona->apellido_materno }}</td>            
                                            <td>{{ $contrato->motivo }}</td>                                 
                                            <td>
                                                @if ($contrato->estado == 1)
                                                <span class="badge badge-success">Pendiente</span>
                                              @elseif ($contrato->estado == 2)
                                              <span class="badge badge-info">Entregado</span>
                                               @elseif ($contrato->estado == 3)
                                               <span class="badge badge-warning">Oservado</span>
                                               @elseif ($contrato->estado == 4)
                                               <span class="badge badge-danger">Rechazado</span>
                                              @endif
                                            </td>
                                            <td>{{ $contrato->compra_id }}</td>
                                            <td>
                                                {{-- @can('tieneacceso', 'rol.show') --}}
                                                <a class="btn btn-info" href="{{route('contratos.show',$contrato->id)}}">Ver</a>
                                                {{-- @endcan --}}
                                            </td> 
                                            <td>

                                                {{-- @can('tieneacceso', 'rol.edit') --}}
                                                <a class="btn btn-success"
                                                    href="{{ route('contratos.edit', $contrato->id) }}">Editar</a>
                                                {{-- @endcan --}}
                                            </td>
                                            <td>
                                                {{-- @can('tieneacceso', 'rol.show') --}}
                                                <a class="btn btn-info" href="{{route('vercontrato',$contrato->id)}}">Contrato</a>
                                                {{-- @endcan --}}
                                            </td> 

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $contratos->links() }}
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
