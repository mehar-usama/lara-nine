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
          {!! Form::model($model, ['files' => true, 'id' => 'register']) !!}
            @csrf
          <div class="card-header">
            <h3 class="card-title">{{ __('Register') }}</h3>
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
              <div class="col-12">
                <div class="form-group">
                  <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                  {{ Form::text('name',  $model->name, ['class'=>'form-control form-control-sm', 'autofocus', 'autocomplete' => 'name']) }}
                  @error('name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
                  {{ Form::email('email',  $model->email, ['class'=>'form-control form-control-sm', 'autofocus', 'autocomplete' => 'email']) }}
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('User Type') }}</label>
                  {{ Form::select('user_type', [''=>__('select')] + getUsertypeArr(), $model->user_type, ['class'=>'form-control form-control-sm']) }}
                      @error('user_type')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Group') }}</label>
                  {{ Form::select('permission_group_id', [''=>__('select')] + getGroupArr(), $model->permission_group_id, ['class'=>'form-control form-control-sm']) }}
                      @error('permission_group_id')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                  {{ Form::select('status', [''=>__('select')] + getStatusArr(), $model->status, ['class'=>'form-control form-control-sm']) }}
                      @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
                  {{ Form::password('password',   ['class'=>'form-control form-control-sm', 'autofocus', 'autocomplete' => 'new-password']) }}
                      @error('password')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                      <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                      {{ Form::password('password_confirmation',   ['class'=>'form-control form-control-sm', 'autofocus', 'autocomplete' => 'new-password']) }}
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info">{{ __('Register') }}</button>
          </div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection



@push('css')
<style>
  label.error {
      color: red;
      font-size: 12px;
      display: block;
      margin-top: 5px;
  }

  input.error, textarea.error {
      border: 1px dashed red;
      font-weight: 200;
      color: red;
  }
</style>
@endpush

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
@endpush

@push('jscripts')
<script>
  $(document).ready(function() {
    $("#register").validate({
    rules: {
      name : {
        required: true,
      },
      email: {
        required: true,
        email : true,
      },
      user_type: {
        required: true,
      },
      permission_group_id: {
        required: true,
      },
      status: {
        required: true,
      },
      password: {
        required: true,
      },
      password_confirmation: {
        required: true,
      },
    }
    });
  });
</script>
@endpush
