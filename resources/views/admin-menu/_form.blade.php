<section class="content-header">
  <div class="container">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Admin Menu</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Admin menu</a></li>
          <li class="breadcrumb-item active">create</li>
        </ol>
      </div>
    </div>
  </div>
</section>



<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card card-info card-outline">
          {!! Form::model($model, ['files' => true, 'id' => 'admin-menu']) !!}
          <div class="card-header">
            <h3 class="card-title">New</h3>
          </div>
          <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  {{ Form::label('parent',__('Parent')) }}<span class="text-success"><b>*</b></span>
                  {{ Form::select('parent', [''=>__('select')] + getParentsArr(), $model->parent, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  {{ Form::label('title',__('Title')) }}<span class="text-danger"><b>*</b></span>
                  {{ Form::text('title',  $model->title, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  {{ Form::label('route',__('Route')) }}<span class="text-success"><b>*</b></span>
                  {{ Form::text('route',  $model->route, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  {{ Form::label('controller',__('Controller')) }}<span class="text-success"><b>*</b></span>
                  {{ Form::text('controller',  $model->controller, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  {{ Form::label('action',__('Action')) }}<span class="text-success"><b>*</b></span>
                  {{ Form::text('action',  $model->action, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  {{ Form::label('icon',__('Icon')) }}<span class="text-success"><b>*</b></span>
                  {{ Form::text('icon',  $model->icon, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  {{ Form::label('ask_list_type',__('Ask List Type')) }}<span class="text-danger"><b>*</b></span>
                  {{ Form::select('ask_list_type', [''=>__('select')] + getListTypeArr(), $model->ask_list_type, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  {{ Form::label('show_in_menu',__('Show In Menu')) }}<span class="text-danger"><b>*</b></span>
                  {{ Form::select('show_in_menu', [''=>__('select')] + getShowMenuArr(), $model->show_in_menu, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
              <div class="col-4">
                <div class="form-group">
                  {{ Form::label('sort_by',__('Sort By')) }}<span class="text-success"><b>*</b></span>
                  {{ Form::text('sort_by',  $model->sort_by, ['class'=>'form-control form-control-sm']) }}
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
            <a href="{{url('/admin-menu')}}" class="btn btn-danger">Close</a>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>

@push('css')
<style>
  label.error {
      color: red;
      font-size: 12px;
      display: block;
      margin-top: 5px;
  }

  input.error, textarea.error, select.error {
      border: 1px dashed red;
      font-weight: 200;
      color: red;
  }
</style>
@endpush

@push('jscripts')
<script>
  $(document).ready(function() {
    $("#admin-menu").validate({
    rules: {
      parent : {
        required: false,
        number: true,
      },
      title: {
        required: true,
      },
      ask_list_type: {
        required: true,
        number: true,
      },
      show_in_menu: {
        required: true,
        number: true,
      },
    }
    });
  });
</script>
@endpush
