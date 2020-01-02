@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li class="active">Elenco admin</li>
		</ol>
	</div>
	<div class="graph-visual tables-main">
		@if(Auth::user()->role_type=='1')			
			<a href="{{url('admin/aggiungi-segretaria')}}" class="btn blue">{{ __('menu.Add Secretary') }} </a>
		@elseif(Auth::user()->role_type=='2')
			@if(isset($menuData[1]['write']))
			<a href="{{url('admin/aggiungi-segretaria')}}" class="btn blue">{{ __('menu.Add Secretary') }} </a>
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
				<table class="table table-bordered">
					 <thead> 
				 		<tr> 				 		 
				 		  <th>{{ __('menu.Name') }}</th>
				 		   <th>Email</th>
				 		    <th>{{ __('menu.Phone') }}</th>
				 		     <th>Cap</th>
				 		     <th>Nata/o</th>
				 		     	@if(Auth::user()->role_type=='1')			
									<th>{{ __('menu.Action') }}</th>
								@elseif(Auth::user()->role_type=='2')
									@if(isset($menuData[1]['write']))
										<th>{{ __('menu.Action') }}</th>
									@endif
								@endif
				 		  </tr>
				 		</thead> 
				 <tbody> 
				 	@foreach($userDetail as $user)
				 	  <tr> 				 		
				 		 <td>{{$user->name}}</td> 
				 		 <td>{{$user->email}}</td> 
				 		 <td>{{$user->phone}}</td> 
				 		 <td>{{$user->cap}}</td> 
				 		 <td>{{date('d-m-Y',strtotime($user->dob))}}</td>
				 		  					 		  		
							    @if(Auth::user()->role_type=='1')
							    	<td>			
									<a class="btn btn-info btn-sm" href="{{url('admin/modifica-segretaria/'.$user->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							  		<a class="btn btn-danger btn-sm" href="{{url('admin/deletesecretary/'.$user->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo utente')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  		</td>
								@elseif(Auth::user()->role_type=='2')
									@if(isset($menuData[1]['write']))
										<td>
										<a class="btn btn-info btn-sm" href="{{url('admin/modifica-segretaria/'.$user->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							  			<a class="btn btn-danger btn-sm" href="{{url('admin/deletesecretary/'.$user->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo utente')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
							  			</td>
									@endif
								@endif
				 	</tr>
				 	@endforeach
				    
				   </tbody>
				 </table> 
			</div>
		</div>
	</div>
</div>
@endsection							
