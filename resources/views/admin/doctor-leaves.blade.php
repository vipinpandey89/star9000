@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
<div class="outter-wp">
	<div class="sub-heard-part">
		<ol class="breadcrumb m-b-0">
			<li class="active">Doctors</li>
		</ol>
	</div>
	<div class="graph-visual tables-main">			
		<a href="{{url('admin/add-doctor')}}" class="btn blue">Add doctor </a>
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
				 		  <th>Name</th>
				 		  <th>Email</th>
				 		  <th>Phone</th>
				 		  <th>Cap</th>
				 		  <th>Nata/o a</th>
				 		   <th>Action</th>
				 		  </tr>
				 	 </thead> 
				 <tbody> 
				 	<?php 
				 		$i='1';
				 	?>
				 	@foreach($userDetail as $iteam)

				 	  <tr>

				 	  	<td>{{$i}}</td>

				 		 <td>{{$iteam->name}}</td> 	

				 		 <td>{{$iteam->email}}</td>

				 		 <td>{{$iteam->phone}}</td> 

				 		  <td>{{$iteam->cap}}</td> 	 

				 		   <td>{{date('d-m-Y',strtotime($iteam->dob))}}</td> 		 		
				 		
				 		  <td>			 		  									    
							  <a class="btn btn-info btn-sm" href="{{url('admin/editdoctor/'.$iteam->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

							  <a class="btn btn-danger btn-sm" href="{{url('admin/deletesecretary/'.$iteam->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare questo')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
