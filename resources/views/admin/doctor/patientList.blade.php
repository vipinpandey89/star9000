@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp container">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('medico/bacheca')}}">Home</a></li>
			<li class="active">Sezione paziente</li>
		</ol>
	</div>
	<div class="graph-visual tables-main">
		<div class="graph">
			<div class="tables">
				@if (Session::has('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{{Session::get('success') }}</strong>
					</div>
				@endif
				@if (Session::has('error'))
					<div class="alert alert-danger  alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{{Session::get('error') }}</strong>
					</div>
				@endif
				@if($user->role_type == 1)
				<form class="md-form" action="{{url('admin/importazione-paziente')}}" method="post" enctype="multipart/form-data">
				  	<div style="position:relative;overflow: hidden;">
						<a class='btn' href='javascript:;'>
							Scegli il file...
							<input type="file" style='position:absolute;z-index:2;top:15px;left:0;opacity:0;background-color:transparent;color:transparent;' name="import_file" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
						</a>
						&nbsp;
						<span class='label label-info' id="upload-file-info"></span>
						<button style="margin-left:250px;" type="submit" class="btn btn-secondary">Importa</button>
					</div>
					 {!! csrf_field() !!}
				</form>
				@endif
				<table id="myTable" class="table table-bordered">
					 <thead> 
				 		<tr> 		
				 		 	<th>S.No</th>
				 		 	<th>{{ __('patient.Surname') }}</th>	 		 
				 		  	<th>{{ __('patient.Name') }}</th>
				 		  	<th>{{ __('patient.Email') }}</th>
				 		  	<th>{{ __('patient.Phone') }}</th>
				 		  	<th>{{ __('patient.Date of Birth') }}</th>
				 		  	<th>{{ __('patient.Completion Status') }}</th>
				 		   	<th>{{ __('patient.Action') }}</th>
				 		</tr>
				 	</thead> 
				 	<tbody> 
				 	<?php 
				 		$i='1';
				 	?>
				 	@foreach($patients as $patient)
				 	  	<tr>
				 	  		<td>{{$i}}</td>
				 		 	<td>{{ (!empty($patient->surname)?$patient->surname:'NA') }}</td> 
				 		 	<td>{{ (!empty($patient->name)?$patient->name:'NA') }}</td>
				 		 	<td>{{ (!empty($patient->email)?$patient->email:'NA') }}</td>
				 		 	<td>{{ (!empty($patient->phone)?$patient->phone:'NA') }}</td>
				 		 	<td>{{ (!empty($patient->dob)?$patient->dob:'NA') }}</td>
				 		 	<td>
				 		 		@if (!empty($patient->surname) && !empty($patient->name) && !empty($patient->email) && !empty($patient->phone) && !empty($patient->dob))
				 		 			<i class="fa fa-check-square" aria-hidden="true"></i>
				 		 		@else
				 		 			<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
				 		 		@endif
				 		 	</td>	
				 		 	<td>
							  <a class="btn btn-info btn-sm" href="{{url('medico/modifica-paziente/'.$patient->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							</td>
				 		</tr>
				 		<?php $i++;?>
				 	@endforeach
				   </tbody>
				 </table> 
			</div>
		</div>
	</div>
</div>
@endsection
