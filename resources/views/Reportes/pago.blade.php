@extends('admin.layout.master')
@section('title','Reportes-Fun')
@section('page-level-css')

  <!-- DataTables -->
  
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style type="text/css">
</style>  
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Reportes</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard v1</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
            <div class="row">
              <div class="col-12">
    
                <div class="card">
                 
                  <!-- /.card-header -->
                  <div class="card-body">
                    
             <h2>Reportes Funeraria</h2>
             <div class="form-group">
                @include('Custom.mensaje')

                <form action="{{route('reportes')}}" method="POST" id="formReporte">
                  @csrf
                 <label>Selecione Reporte</label>
                 <select class="form-control selectOption" name="selectReporte" id="selectReporte" required>
                     <option class="selectOption"  value="compras">Compras</option>
                     <option  class="selectOption" value="usuarios">Usuarios</option>
                     <option  class="selectOption"  value="clientes">Clientes</option>
                     <option  class="selectOption" selected value="pagos">Pagos</option>
                     <option  class="selectOption" value="roles">Roles</option>
                     <option  class="selectOption" value="sucursales">Sucursales</option>
                     <option class="selectOption"  value="items">Items</option>
                     <option  class="selectOption"  value="servicios">Servicios</option>
                     <option  class="selectOption"  value="paquetes">Paquetes</option>
                     <option  class="selectOption"  value="comisiones">Comisiones</option>
                     <option  class="selectOption"  value="contratos">Contratos</option>
                     <option  class="selectOption" value="activos">Activos</option>
                 </select>
                
           </form>
               </div>
                    <table id="reportes" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        @foreach ($nombreDatos as $nombreDato)
                        <th>{{$nombreDato}}</th>
                        @endforeach
                      </tr>
                      </thead>
                      <tbody>
                      
                        @foreach ($datos as $dato)
                        <tr>
                        <td>{{$dato->id}}</td>                    
                        <td>{{$dato->nombre}}</td>
                        <td>{{$dato->descripcion}}</td>                   
                    </tr>        
                        @endforeach
                       
                      </tbody>
                      <tfoot>
                      <tr>
                        @foreach ($nombreDatos as $nombreDato)
                        <th>{{$nombreDato}}</th>
                        @endforeach                    
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->    



    
    
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('page-level-script')

<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{ asset('dist/js/funeraria/reportes.js')}}"></script>

    <script type="text/javascript">
$(function () {
  $('#reportes').append('<caption style="caption-side: bottom">A fictional company\'s staff table.</caption>');

    $("#reportes").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [
        {
            extend: 'copy',
            text: "Copiar", //Título del botón
        },
       "csv",
       {
            extend: 'excel',
            messageTop: 'The information in this table is copyright to Sirius Cybernetics Corp.',
            title: 'Reporte Funeraria'
        }, 
        {
            extend: 'pdf',
            text: "Export PDF", //Título del botón
            messageTop: 'Direccion: Av. San Pedro Hospital Frances        Celular : 700-111-11 //n s',
            messageBottom: null,
            title: 'Reporte Funeraria'
        }, 
        {
            extend: 'print',
            text: "Imprimir",
            title: 'Reporte Funeraria',
            messageTop: function () {
                printCounter++;
                return 'Reporte realizado por el Sistema de la Funeraria SAN PEDRO COTOCA.';
                /*if ( printCounter === 1 ) {
                    return 'Reporte realizado por el Sistema de la Funeraria SAN PEDRO COTOCA.';
                }
                else {
                    return 'Ya Imprimiste el documento '+printCounter+' veces';
                }*/
            },
            messageBottom: null
        }, 
         {
            extend: 'colvis',
            text: "Columnas"
        }
      ]
    }).buttons().container().appendTo('#reportes_wrapper .col-md-6:eq(0)');
    
  });
    </script>
@endsection