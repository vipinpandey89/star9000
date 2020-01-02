@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li class="active">{{ __('privacy.Privacy') }}</li>
		</ol>
	</div>
	<div class="forms-main">
		@if (Session::has('error'))
			<div class="alert alert-danger alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<strong>{{Session::get('error') }}</strong>
			</div>
		@endif
		@if (Session::has('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button> 
				<strong>{{Session::get('success') }}</strong>
			</div>
		@endif
		<div class="set-1">
			<div class="graph-2 general">
				<h3 class="inner-tittle two"></h3>
				<div class="grid-1">
					<div class="form-body">
						<form id="privacy-form" class="form-horizontal" method="post" >
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-sm-2 control-label">{{ __('privacy.Description') }}</label>
										<div class="col-sm-8">
											<textarea rows="20" id="description" class="form-control" name="description" placeholder="{{ __('privacy.Description') }}">{{ $privacy->description }}</textarea>
										</div>									
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<label class="col-sm-2 control-label">Ultimo aggiornamento</label>
										<div class="col-sm-8"><br>
											@php echo date('Y-m-d H:i',strtotime($privacy->updated_at)); @endphp
										</div>									
									</div>
								</div>
							</div>
							
							{!! csrf_field() !!}								

							<div class="col-sm-offset-2"> <button type="submit" name="add" class="btn btn-default">Salva</button> </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var langURl= base_url+'/administrator/js/it_IT.js';
	tinymce.init({
		selector: 'textarea#description',
		menubar:'format',
		language: 'it_IT'
	});
});
</script>
@endsection