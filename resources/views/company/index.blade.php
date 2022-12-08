@extends('layouts.app')
@section('content')

<section class="content-header">
	<div class="container">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1>Contact</h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active">contact</li>
				</ol>
			</div>
		</div>
	</div>
</section>


<section class="content">
	<div class="container">
		<div class="card">
			{!! Form::model($model, ['files' => true, 'id' => 'contact-form']) !!}
			<div class="card-body">
				@if ($errors->any())
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					<div>{{ $error }}</div>
					@endforeach
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
			{!! Form::close() !!}
		</div>
	</div>

</section>	
@endsection


@push('jscripts')
<script>
	$(document).ready(function() {


		$("body").on("change", ".file-inpt", function (e) {
			if($(this).val()!=''){
				$('.up-btn-div').removeClass('d-none');
				$("#upload-btn").attr("disabled", false);
			}else{
				$('.up-btn-div').addClass('d-none');
			}
		});

		$("body").on("submit", "#contact-form", function (e) {
			e.preventDefault();

			$("#upload-btn").attr("disabled", true);
			frm = $(this);
			var formData = new FormData(frm[0]);

			$.ajax({
				url: '/contact-import',
				type: 'POST',
				data: formData,
				cache: false,
				contentType: false,
				processData: false,
				success: function (response) {
					console.log(response);
				},
				error: function(xhr, ajaxOptions, thrownError){

				}
			});
			return false;
		});







	});
</script>
@endpush