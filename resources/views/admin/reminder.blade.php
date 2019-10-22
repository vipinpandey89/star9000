@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')

<div class="outter-wp">

	<div class="sub-heard-part">

		<ol class="breadcrumb m-b-0">

			<li><a href="{{url('admin/dashboard')}}">Home</a></li>

			<li class="active">{{ __('patient.Reminder') }}</li>

		</ol>

	</div>

	<div class="graph-visual tables-main">			

		<a href="{{url('admin/aggiungi-promemoria')}}" class="btn blue">{{ __('patient.Add Reminder') }} </a>

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

				 		  <th>Descrizione</th>

				 		  <th>Tempo</th>

				 		   <th>{{ __('menu.Action') }} </th>

				 		  </tr>

				 		</thead> 

				 <tbody> 

				 	<?php 

				 		$i='1';

				 	?>

				 	@foreach($reminders as $reminder)



				 	  <tr>



				 	  	<td>{{$i}}</td>



				 		 <td>{{$reminder->description}}</td> 	



				 		 <td>{{$reminder->reminder_time}}</td>

				 		  <td>				 		  		

							    

							  <a class="btn btn-info btn-sm" href="{{url('admin/modifica-promemoria/'.$reminder->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>



							  <a class="btn btn-danger btn-sm" href="{{url('admin/elimina-promemoria/'.$reminder->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questa promemoria?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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

