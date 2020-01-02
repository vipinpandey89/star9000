@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')

<div class="outter-wp">

	<div class="sub-heard-part">

		<ol class="breadcrumb m-b-0">

			<li class="active">{{ __('menu.Add specialty') }}</li>

		</ol>

	</div>

	<div class="graph-visual tables-main">			
		@if(Auth::user()->role_type=='1')			
			<a href="{{url('admin/aggiungi-visita')}}" class="btn blue">{{ __('menu.Add specialty') }} </a>
		@elseif(Auth::user()->role_type=='2')
			@if(isset($menuData[2]['write']))
			<a href="{{url('admin/aggiungi-visita')}}" class="btn blue">{{ __('menu.Add specialty') }} </a>
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

				 		 <th>S.No</th>		 		 

				 		  <th>{{ __('menu.specialty') }}</th>

				 		  
				 		  	@if(Auth::user()->role_type=='1')			
								<th>{{ __('menu.Action') }}</th>
							@elseif(Auth::user()->role_type=='2')
								@if(isset($menuData[2]['write']))
								<th>{{ __('menu.Action') }}</th>
								@endif
							@endif
				 		      

				 		  </tr>

				 		</thead> 

				 <tbody> 

				 	<?php 

				 		$i='1';

				 	?>

				 	@foreach($data as $iteam)



				 	  <tr> 				 	

				 	  	<td>{{$i}}</td> 	

				 		 <td>{{$iteam->title}}</td> 				 		

				 		
				 		 	@if(Auth::user()->role_type=='1')			
								<td>				 		  		
								  <a class="btn btn-info btn-sm" href="{{url('admin/modifica-visite/'.$iteam->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								  <a class="btn btn-danger btn-sm" href="{{url('admin/delete-examination/'.$iteam->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questa specialità?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</td>
							@elseif(Auth::user()->role_type=='2')
								@if(isset($menuData[2]['write']))
								<td>				 		  		
								  <a class="btn btn-info btn-sm" href="{{url('admin/modifica-visite/'.$iteam->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
								  <a class="btn btn-danger btn-sm" href="{{url('admin/delete-examination/'.$iteam->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questa specialità?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
								</td>
								@endif
							@endif
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

