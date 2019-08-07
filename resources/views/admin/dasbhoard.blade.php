@extends('admin.layout.layout')
@section('title','dasbhoard')
@section('content')
<div class="outter-wp">
	<div class="custom-widgets">
		<div class="row-one">
			<div class="col-md-3 widget">
				<div class="stats-left ">
					<h5>{{ __("menu.Today's") }}</h5>
					<h4> {{ __('menu.Users') }}</h4>
				</div>
				<div class="stats-right">
					<label>90</label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="col-md-3 widget states-mdl">
				<div class="stats-left">
					<h5>{{ __("menu.Today's") }}</h5>
					<h4>{{ __('menu.Visitors') }}</h4>
				</div>
				<div class="stats-right">
					<label> 85</label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="col-md-3 widget states-thrd">
				<div class="stats-left">
					<h5>{{ __("menu.Today's") }}</h5>
					<h4>{{ __('menu.Tasks') }}</h4>
				</div>
				<div class="stats-right">
					<label>51</label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="col-md-3 widget states-last">
				<div class="stats-left">
					<h5>{{ __("menu.Today's") }}</h5>
					<h4>{{ __('menu.Alerts') }}</h4>
				</div>
				<div class="stats-right">
					<label>30</label>
				</div>
				<div class="clearfix"> </div>	
			</div>
			<div class="clearfix"> </div>	
		</div>
	</div>
</div>

@endsection							
