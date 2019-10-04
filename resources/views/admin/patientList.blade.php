@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp container">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
			<li class="active">Sezione paziente</li>
		</ol>
	</div>
	<div class="graph-visual tables-main">			
		<a href="{{url('admin/aggiungi-paziente')}}" class="btn blue">{{ __('patient.Add Patient') }} </a>
		<div class="graph">
			<div class="tables">
				@if (Session::has('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{{Session::get('success') }}</strong>
					</div>
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
							  <a class="btn btn-info btn-sm" href="{{url('admin/modifica-paziente/'.$patient->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
