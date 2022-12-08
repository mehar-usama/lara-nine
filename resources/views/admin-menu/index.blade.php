@extends('layouts.app')
@section('content')
<section class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Admin Menu</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">admin menu</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h3 class="card-title">List</h3>
        <div class="card-tools">
          <a href="{{url('admin-menu-create')}}" class="btn btn-primary btn-xs mx-2"  title="Add New">
            <i class="fas fa-plus"></i>
          </a>
        </div>
      </div>
      <div class="card-body">
        <table id="admin_menu" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th class="text-center">Parent</th>
            <th class="text-center">Title</th>
            <th class="text-center">Route</th>
            <th class="text-center">Controller</th>
            <th class="text-center">Action</th>
            <th class="text-center">Icon</th>
            <th class="text-center">Ask List Type</th>
            <th class="text-center">Show In Menu</th>
            <th class="text-center">Sort By</th>
            <th class="text-center">Actions</th>
          </tr>
          </thead>
          <tbody>
            @if($models!=null)
            @foreach($models as $model)
            <tr>
              <td class="text-center">{!! getParentTitle($model->parent)  !!}</td>
              <td class="text-center">{{ $model->title }}</td>
              <td class="text-center">{{ $model->route }}</td>
              <td class="text-center">{{ $model->controller }}</td>
              <td class="text-center">{{ $model->action }}</td>
              <td class="text-center">{{ $model->icon }}</td>
              <td class="text-center">{!! getLabelArr()[$model->ask_list_type] !!}</td>
              <td class="text-center">{!! getLabelArr()[$model->show_in_menu ] !!}</td>
              <td class="text-center"><span class="badge grid-badge badge-success">{{$model->sort_by}}</span></td>
              <td class="text-center">
                <a href="{{url('/admin-menu-update/'.$model->id)}}" class="btn  btn-tool"><i class="fa fa-edit"></i> </a>
                <a href="{{url('/admin-menu-delete/'.$model->id)}}" class="btn  btn-tool"><i class="fa fa-trash"></i> </a>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
          <!-- <tfoot>
          <tr>
            <th>Parent</th>
            <th>Title</th>
            <th>Controller</th>
            <th>Action</th>
            <th>Icon</th>
            <th>Show In Menu</th>
            <th>Sort By</th>
            <th>Actions</th>
          </tr>
          </tfoot> -->
        </table>
      </div>
    </div>
  </div>
</section>
@endsection


@push('css')
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush

@push('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
@endpush

@push('jscripts')
<script>
  $(function () {
    $("#admin_menu").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#admin_menu_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
