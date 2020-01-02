@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp container">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li class="active">Sezione paziente</li>
		</ol>
	</div>
	<div class="graph-visual tables-main">	
		@if(Auth::user()->role_type=='1')			
			<a href="{{url('admin/aggiungi-paziente')}}" class="btn blue">{{ __('patient.Add Patient') }} </a>
		@elseif(Auth::user()->role_type=='2')
			@if(isset($menuData[6]['write']))
			<a href="{{url('admin/aggiungi-paziente')}}" class="btn blue">{{ __('patient.Add Patient') }} </a>
			@endif
		@endif		
		
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
				 		  	@if(Auth::user()->role_type=='1')			
								<th>{{ __('patient.Action') }}</th>
							@elseif(Auth::user()->role_type=='2')
								@if(isset($menuData[6]['write']))
								<th>{{ __('patient.Action') }}</th>
								@endif
							@endif
				 		   	
				 		</tr>
				 	</thead> 
				 	<tbody> 
				 	
				   </tbody>
				 </table> 
			</div>
		</div>
	</div>
</div>
@endsection
