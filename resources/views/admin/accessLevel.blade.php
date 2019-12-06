@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')

<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li><a href="{{url('admin/dashboard')}}">Home</a></li>
			<li class="active">{{ __('accesslevel.Access Level') }}</li>
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
						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<div class="col-sm-4">
										<select class="form-control1" name="users" id="access-level-users">
											<option value="">Seleziona utente</option>
											@foreach($usersecreatary as $secretary)
											<option value="{{$secretary->id}}">{{$secretary->surname.' '.$secretary->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="col-sm-4">
										&nbsp;
									</div>								
								</div>
							</div>
						</div>
					</div>
				</div>
				@if(!empty($uid))
				<center><h2>{{ $userData->surname.' '.$userData->name}}</h2></center>
				<div class="grid-1">
					<form id="access-level-form" class="form-horizontal" method="post" >
						<input type="hidden" name="user_id" value="{{ $uid }}" />
						<table class="table table-bordered">
							<thead>
							<tr>
								<th>Linguetta</th>
								<th>Scrivi</th>
							</tr>
							</thead>
							<tbody>
								@foreach($navigationTabs as $tab)
								<tr>
									<td><input name="tabs[{{ $tab->id }}][id]" value="{{ $tab->id }}" type="checkbox" @php echo isset($existingAccessData[$tab->id]['id'])?'checked':''; @endphp/>&nbsp;{{ $tab->tab_name }}</td>
									<td><input name="tabs[{{ $tab->id }}][write]" value="1" type="checkbox" @php echo isset($existingAccessData[$tab->id]['write'])?'checked':''; @endphp/></td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! csrf_field() !!}
						<br/>
						<button type="submit" id="save-access-level" class="btn btn-default">Salva</button>
					</form>
				</div>
				@endif	
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$('#access-level-users').change(function(){
		var selUserId = $(this).val();
		window.location.href = "{{url('/admin/livello-di-accesso')}}"+'/'+selUserId;
	});
});
</script>
@endsection