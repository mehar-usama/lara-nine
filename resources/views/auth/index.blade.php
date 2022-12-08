@extends('layouts.app')
@section('content')
<section class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Users</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">users</li>
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
          <a href="{{url('register')}}" class="btn btn-primary btn-xs mx-2"  title="Add New">
            <i class="fas fa-plus"></i>
          </a>
        </div>
      </div>
      <div class="card-body">
        <table id="register-users" class="table table-bordered table-striped">
          <thead>
          <tr>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">User Type</th>
            <th class="text-center">Group</th>
            <th class="text-center">Status</th>
            <th class="text-center">Actions</th>
          </tr>
          </thead>
          <tbody>
            @if($models!=null)
            @foreach($models as $model)
            <?php
            $class='';
            $text='';
             if ($model->status==1) {
               $class = 'success';
               $text = 'Active';
             }else{
               $class='danger';
               $text = 'In-Active';
             }
            ?>

            <tr>
              <td class="text-center">{{$model->name}}</td>
              <td class="text-center">{{$model->email}}</td>
              <td class="text-center">{{$model->user_type}}</td>
              <td class="text-center">{{$model->permission_group_id}}</td>
              <td class="text-center"><span class="badge grid-badge badge-{{$class}}">{{$text}}</span></td>
              <td class="text-center">
                <a href="{{url('/register-update/'.$model->id)}}" class="btn  btn-tool" title="Edit"><i class="fa fa-edit"></i> </a>
                <a href="{{url('/register-delete/'.$model->id)}}" class="btn  btn-tool" title="Trash"><i class="fa fa-trash"></i> </a>
              </td>
            </tr>
            @endforeach
            @endif
          </tbody>
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
    $("#register-users").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#register-users_wrapper .col-md-6:eq(0)');
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
