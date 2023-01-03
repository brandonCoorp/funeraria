@extends('admin.layout.master')
@section('title', 'Activos-Movimiento')
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
                    <h1 class="m-0">Activos</h1>
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
                            <form action="{{route('activo.suc')}}" method="POST" id="formReporte">
                                @csrf
                            <div class="card-tools col-sm-6"> 
                                <div class="form-group">              
                                <select class="form-control" name="sucursal_id" id="sucursal_id" >
                                    <option selected value="0">Todas las Sucursales</option>
                                    @foreach ($sucursals as $sucursal)  
                                  <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                                 
                                  @endforeach
                                </select>
                            </div>       
                            </div>
                        </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Codigo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Stock</th>
                                        <th scope="col">Estado</th>                                       
                                        <th scope="col">Precio Unidad</th>
                                        <th scope="col">tipo</th>
                                        <th colspan="3"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <th scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->cod_item }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->cantidad }}</td>
                                            <td>
                                                @if ($item->estado == 1)
                                                <span class="badge badge-success">Activo</span>
                                              @elseif ($item->estado == 2)
                                              <span class="badge badge-info">Reservado</span>
                                               @elseif ($item->estado == 3)
                                               <span class="badge badge-warning">Dañado</span>
                                               @elseif ($item->estado == 4)
                                               <span class="badge badge-danger">Retirado</span>
                                              @endif
                                            </td>                         
                                            <td>{{ $item->costo_unit }} Bs.</td>
                                            <td>
                                                @if ($item->tipo == 1)
                                                <span class="badge badge-success">Prestamo</span>
                                              @elseif ($item->tipo == 2)
                                              <span class="badge badge-info">Item de Venta</span>
                                               @elseif ($item->tipo == 3)
                                               <span class="badge badge-warning">Item de Venta</span>
                                               @elseif ($item->tipo == 4)
                                               <span class="badge badge-danger">Prestamo</span>
                                              @endif
                                            </td>
                                            <td>
                                                 @can('verificarPrivilegio', 'MOVACT') 
                                                 @if($item->cantidad > 0)
                                                <a class="btn btn-info" href="{{ route('activos.transferir', $item->id) }}">Transferir</a>
                                                @endif
                                                @endcan 
                                            </td>
                                            
                                            <td>
                                                 @can('verificarPrivilegio', 'MOVACT') 
                                                <a class="btn btn-success"
                                                    href="{{ route('activos.ajuste', $item->id) }}">Ajustes</a>
                                                 @endcan 
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
<script src="{{ asset('dist/js/funeraria/activo.js')}}"></script>
    <script type="text/javascript"></script>
@endsection
