@extends('admin.layout.master')
@section('title','Contrato-Generar')
@section('page-level-css')

<style type="text/css">
   
</style>  
@endsection
@section('content')
<!-- Content Header (Page header) -->
<hr>
<!-- /.content-header -->
<section class="content">

<div class="container-fluid">
    @include('Custom.mensaje')
    <div class="card card-primary">
      
        <hr>
        <div class="card-body">
        <div><h2 style="text-align: center;">Coincidencias Encontradas a su Busqueda</h2></div>

        @if($compras->count() > 0)
        <h3>Compras </h3>
        <table>
            <tbody>
                @foreach ($compras as $compra)
                <tr>
                    <td><b>Nombre: </b>{{$compra->name}} <b>   </td> 
                     <td><b>  Fecha de Compra: </b>{{$compra->fecha}}</td> 
                         <td>---<a href="{{route('compras.show',$compra->id)}}" class="btn btn-block btn-outline-primary btn-sm">Redirigir</a></td>      
                 </tr> 
                   
                @endforeach
            </tbody>
        </table>
                <hr>
        @endif

        @if($items->count() > 0)
        <h3>Items </h3>
        <table>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td><b>Nombre: </b>{{$item->nombre}} <b>   </td> 
                     <td><b>  Descripcion: </b>{{$item->descripcion}} </td> 
                         <td>---<a href="{{route('items.show',$item->id)}}" class="btn btn-block btn-outline-primary btn-sm">Redirigir</a></td>      
                 </tr>  
                @endforeach
            </tbody>
        </table>
                <hr>
        @endif
        @if($paquetes->count() > 0)
        <h3>Paquetes </h3>
        <table>
            <tbody>
                @foreach ($paquetes as $paquete)
                <tr>
                    <td><b>Nombre: </b>{{$paquete->nombre}} <b>   </td> 
                     <td><b>  Descripcion: </b>{{$paquete->descripcion}} </td> 
                         <td>---<a href="{{route('paquetes.show',$paquete->id)}}" class="btn btn-block btn-outline-primary btn-sm">Redirigir</a></td>      
                 </tr> 
                
                   
                @endforeach
            </tbody>
        </table>
                <hr>
        @endif

        @if($clientes->count() > 0)
        <h3>Clientes </h3>
        <table>
            <tbody>
                @foreach ($clientes as $cliente)
                <tr>
                    <td><b>Nombre: </b>{{$cliente->name}} <b>   </td> 
                     <td><b>Direccion: </b>{{$cliente->direccion}}  </td> 
                         <td>---<a href="{{route('clientes.show',$cliente->id)}}" class="btn btn-block btn-outline-primary btn-sm">Redirigir</a></td>      
                 </tr>          
                @endforeach
            </tbody>
        </table>
                <hr>
        @endif

@if($usuarios->count() > 0)
<h3>Usuarios </h3>
<table>
    <tbody>
        @foreach ($usuarios as $usuario)
        <tr>
           <td><b>Nombre: </b>{{$usuario->name}} <b>   </td> 
            <td><b>Direccion: </b>{{$usuario->direccion}}  </td> 
                <td>---<a href="{{route('usuarios.show',$usuario->idUsuario)}}" class="btn btn-block btn-outline-primary btn-sm">Redirigir</a></td>      
        </tr>
        @endforeach
    </tbody>
</table>
        <hr>
@endif






    </div>


 </div>
        
       
    
</div>
</section>
@endsection
@section('page-level-script')

    <script type="text/javascript">

    </script>
@endsection    


















