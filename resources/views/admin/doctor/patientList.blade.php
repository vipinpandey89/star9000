@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp container">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li class="active">Sezione paziente</li>
		</ol>
	</div>
	<input type="hidden" id="all-patient" value="{{$all}}"/>
	<div class="graph-visual tables-main">
		<a href="{{url('medico/paziente')}}" style="margin-right: 129px;" class="btn btn-info btn-sm {{ empty($all)?'active':'' }}">I miei pazienti</a>
		<a href="{{url('medico/paziente/tutto')}}" class="btn btn-info btn-sm {{ !empty($all)?'active':'' }}">Tutti i pazienti</a>
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
				 	
				   </tbody>
				 </table> 
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	var allPat = $('#all-patient').val();
	if(allPat == '') {
		var urlT=base_url+'/medico/patientsAjaxMy';
	}else{
		var urlT=base_url+'/medico/patientsAjax/'+allPat;
	}
	$('#myTable').DataTable({
		"language": {
			"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Italian.json"
		},
		"ajax" : {
			url : urlT,
			type: "post"
		},
		"order": [[ 1, "asc" ]],
		serverSide: true,
		"processing": true,
		"paging": true
	});
});
</script>
@endsection
