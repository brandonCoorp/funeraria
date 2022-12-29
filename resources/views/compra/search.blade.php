@extends('admin.layout.master')
@section('title', 'Item-Listar')
@section('page-level-css')
    <style type="text/css">
    .container{
    padding: 10%;
    text-align: center;
   } 
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
                <div class="col-12"><h2>Laravel AutoComplete Search Using Typeahead JS</h2></div>
                <div class="col-12">
                    <div id="custom-search-input">
                        <div class="input-group">
                            <input id="typeahead" name="typeahead" type="text" class="form-control" placeholder="typeahead" />
                            <input id="resp" name="resp" type="text" class="form-control" placeholder="resp" />
                            <input id="paterno" name="paterno" type="text" class="form-control" placeholder="paterno" />
                            <input id="materno" name="materno" type="text" class="form-control" placeholder="materno" />
                            <input id="direccion" name="direccion" type="text" class="form-control" placeholder="direccion" />
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
    </section>
@endsection
@section('page-level-script')
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
<script src="{{ asset('dist/js/funeraria/jquery-ui-1.13.2.custom/jquery-ui.min.js')}}"></script>
<script type="text/javascript">

var path = "{{ route('autocomplete')  }}";

  $('#typeahead').typeahead({
      source:   function (query, process) {
        $.get(path, { term: query }, function (data) {
              return process(data);
          });

      },
  
    afterSelect: function(args){
        console.log("resp: "+args.id); 
        console.log("resp: "+args.nombre);  
        $('#resp').val(args.id);
        $('#paterno').val(args.apellido_paterno);
        $('#materno').val(args.apellido_materno);
              
            }
  });

        
    </script>
@endsection
