@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp container">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
			<li class="active">Gestire il paziente</li>
		</ol>
	</div>
	<div class="graph-visual tables-main">			
		<a href="{{url('admin/add-patient')}}" class="btn blue">{{ __('patient.Add Patient') }} </a>
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
				 		 	<td>
				 		 		@if (Session::has('success'))
				 		 		
				 		 		@endif
				 		 	</td>
				 		 	<td>{{ (!empty($patient->dob)?$patient->dob:'NA') }}</td>	
				 		 	<td>
							  <a class="btn btn-info btn-sm" href="{{url('admin/edit-patient/'.$patient->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
