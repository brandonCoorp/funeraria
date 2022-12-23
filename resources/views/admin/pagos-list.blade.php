@extends('admin.layout.master')
@section('title','Pagos-Listar')
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
        <h1 class="m-0">Pagos</h1>
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
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Pagos</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
           


            <div class="card-body">
                <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                  <thead>
                  <tr>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Rendering engine</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Browser</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Platform(s)</th>
                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column descending" aria-sort="ascending">Engine version</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">CSS grade</th></tr>
                  </thead>
                  <tbody>
                  <tr class="odd">
                    <td class="dtr-control" tabindex="0">Webkit</td>
                    <td class="">Safari 1.2</td>
                    <td class="">OSX.3</td>
                    <td class="sorting_1">125.5</td>
                    <td class="">A</td>
                  </tr><tr class="even">
                    <td class="dtr-control" tabindex="0">Webkit</td>
                    <td class="">Safari 1.3</td>
                    <td class="">OSX.3</td>
                    <td class="sorting_1">312.8</td>
                    <td class="">A</td>
                  </tr><tr class="odd">
                    <td class="dtr-control" tabindex="0">Webkit</td>
                    <td class="">S60</td>
                    <td class="">S60</td>
                    <td class="sorting_1">413</td>
                    <td class="">A</td>
                  </tr><tr class="even">
                    <td class="dtr-control" tabindex="0">Webkit</td>
                    <td class="">Safari 2.0</td>
                    <td class="">OSX.4+</td>
                    <td class="sorting_1">419.3</td>
                    <td class="">A</td>
                  </tr><tr class="odd">
                    <td class="dtr-control" tabindex="0">Webkit</td>
                    <td class="">OmniWeb 5.5</td>
                    <td class="">OSX.4+</td>
                    <td class="sorting_1">420</td>
                    <td class="">A</td>
                  </tr><tr class="even">
                    <td class="dtr-control" tabindex="0">Webkit</td>
                    <td class="">iPod Touch / iPhone</td>
                    <td class="">iPod</td>
                    <td class="sorting_1">420.1</td>
                    <td class="">A</td>
                  </tr><tr class="odd">
                    <td class="dtr-control" tabindex="0">Webkit</td>
                    <td class="">Safari 3.0</td>
                    <td class="">OSX.4+</td>
                    <td class="sorting_1">522.1</td>
                    <td class="">A</td>
                  </tr></tbody>
                  <tfoot>
                  <tr>
                    <th rowspan="1" colspan="1">Rendering engine</th>
                    <th rowspan="1" colspan="1">Browser</th>
                    <th rowspan="1" colspan="1">Platform(s)</th>
                    <th rowspan="1" colspan="1">Engine version</th>
                    <th rowspan="1" colspan="1">CSS grade</th></tr>
                  </tfoot>
                </table></div></div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 51 to 57 of 57 entries
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous" id="example2_previous">
                                    <a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                </li>
                                <li class="paginate_button page-item ">
                                    <a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0" class="page-link">5</a>
                                </li>
                                <li class="paginate_button page-item active">
                                    <a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0" class="page-link">6</a>
                                </li>
                                <li class="paginate_button page-item next disabled" id="example2_next">
                                    <a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                                </li></ul></div></div></div></div>
              </div>




            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Crear Nuevo Pago" class="btn btn-success float-right">
        </div>
      </div>
    
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
@section('page-level-script')
    <script type="text/javascript">

    </script>
@endsection