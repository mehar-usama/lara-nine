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
          <li class="breadcrumb-item active">Pdf Extract</li>
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
              <div class="col">
                <div class="form-group">
                  <label for="exampleInputFile">Select Csv File</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="uploaded_file" class="custom-file-input file-inpt" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append up-btn-div d-none">
                      <button class="btn btn-success btn-sm" id="upload-btn">Upload</button>
                    </div>
                  </div>
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

@endsection

@push('css')
<style>

</style>
@endpush

@push('jscripts')
<script>

</script>
@endpush
