@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
@php $surgeryType=[1=>'Ambulatoriale',2=>'Day surgery']; @endphp
<div class="outter-wp container">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li class="active">Intervento</li>
		</ol>
	</div>
	<div class="graph-visual tables-main">
		<a href="{{url('admin/intervento')}}" style="margin-right: 129px;" class="btn btn-info btn-sm {{ ($type == 1)?'active':'' }}">Ambulatoriale</a>
		<a href="{{url('admin/intervento/2')}}" class="btn btn-info btn-sm {{ ($type == 2)?'active':'' }}">Day Surgery</a>
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
				 		 	<th>{{ __('patient.Medical Number') }}</th>
				 		 	<th>{{ __('patient.Surname') }}</th>	 		 
				 		  	<th>{{ __('patient.Name') }}</th>
				 		  	<th>{{ __('patient.Email') }}</th>
				 		  	<th>{{ __('patient.Surgery Name') }}</th>
				 		  	<th>{{ __('patient.Date') }}</th>
				 		  	<th>{{ __('patient.Surgery Time') }}</th>
				 		  	<th>{{ __('patient.Surgery Type') }}</th>
				 		   	<th>{{ __('patient.Action') }}</th>
				 		</tr>
				 	</thead> 
				 	<tbody> 
				 	<?php 
				 		$i='1';
				 	?>
				 	@foreach($surgeryList as $surgery)
				 		@php 
				 		$hours = floor($surgery->time / 3600);
  						$minutes = floor(($surgery->time / 60) % 60);
  						@endphp
				 	  	<tr>
				 	  		<td>{{$i}}</td>
				 	  		<td>{{ (!empty($surgery->medical_number)?$surgery->medical_number:'NA') }}</td>
				 		 	<td>{{ (!empty($surgery->surname)?$surgery->surname:'NA') }}</td> 
				 		 	<td>{{ (!empty($surgery->patientname)?$surgery->patientname:'NA') }}</td>
				 		 	<td>{{ (!empty($surgery->email)?$surgery->email:'NA') }}</td>
				 		 	<td>{{ (!empty($surgery->name)?$surgery->name:'NA') }}</td>
				 		 	<td>{{ (!empty($surgery->surgery_date)?$surgery->surgery_date:'NA') }}</td>
				 		 	<td>{{ (!empty($surgery->time)?$hours.':'.$minutes:'NA') }}</td>
				 		 	<td>{{ $surgeryType[$surgery->surgery_type] }}</td>
				 		 	<td>
							  <a class="btn btn-info btn-sm" href="{{url('admin/modifica-intervento/'.$surgery->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
