@if(isset($eyeVisitInputTabs[3]))
@foreach($eyeVisitInputTabs[3][$rData] as $tabInput)
	@php
	$nameOfInput = "eye_visit[".$tabInput['tab_id']."][".$regKey."][".$eye."][".$rData."][".$tabInput['input_name']."]";
	$inputValR = isset($patientEyeData[$tabInput['tab_id']][$regKey][$eye][$rData][$tabInput['input_name']])?$patientEyeData[$tabInput['tab_id']][$regKey][$eye][$rData][$tabInput['input_name']]:'';
	switch($tabInput['type']) {
	    case 'textarea':
	    	@endphp
	    	<td>
				<textarea name="{{ $nameOfInput }}" class="form-control">{{ (isset($inputValR))?$inputValR:'' }}</textarea>
			</td>
	    	@php
	        break;
	    case 'select':
	    	$selectOptions = json_decode($tabInput['input_values']);
	        @endphp
	    	<td>
				<select class="form-control1" name="{{ $nameOfInput }}">
					<option value="">Selezionare {{ $tabInput['title'] }}</option>
					@foreach($selectOptions as $soption)
					<option value="{{ $soption }}" {{ (isset($inputValR))?(($inputValR == $soption)?'selected':''):'' }}>{{ $soption }}</option>
					@endforeach
				</select>
			</td>
	    	@php
	        break;
	    case 'radio':
	    	$radioOptions = json_decode($tabInput['input_values']);
	        @endphp
	    	<td>
				@foreach($radioOptions as $roption)
				<input value="{{$roption}}" type="radio" name="{{ $nameOfInput }}" {{ (isset($inputValR))?(($inputValR == $roption)?'checked':''):'' }}>&nbsp;{{$roption}}
				@endforeach
			</td>
	    	@php
	        break;
	    case 'checkbox':
	    	$checkOptions = json_decode($tabInput['input_values']);
	        @endphp
	    	<td>
				@foreach($checkOptions as $coption)
				<input value="{{$coption}}" type="checkbox" name="{{ $nameOfInput }}[]" <?php echo ((isset($inputValR))?(in_array($coption, $inputValR)?'checked':''):''); ?>>&nbsp;{{$coption}}
				@endforeach
			</td>
	    	@php
	        break;
	    case 'date':
	        @endphp
	    	<td>
				<input type="text" class="form-control1 eye-visit-datepicker" name="{{ $nameOfInput }}" placeholder="{{ $tabInput['title'] }}" value="{{ (isset($inputValR))?$inputValR:'' }}">
			</td>
	    	@php
	        break;
	    case 'print':
	        @endphp
	    	<td>
				<button class="hidden-print float-right btn btn-primary eyevisit-print" id="{{ $tabInput['input_name'] }}" parent="tab-content-{{ $tabCounterSec }}">{{ $tabInput['title'] }}</button>
			</td>
	    	@php
	        break;
	    default:
	    	@endphp
	    	<td>
				<input type="{{$tabInput['type']}}" class="form-control1" name="{{ $nameOfInput }}" placeholder="{{ $tabInput['title'] }}" value="{{ (isset($inputValR))?$inputValR:'' }}">
			</td>
	    	@php
	        break;
	}
	@endphp
@endforeach
@endif