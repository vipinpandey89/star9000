@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')
@php
$iArray = ['text'=>'Casella di testo','number'=>'Numero','textarea'=>'Testo','select'=>'Selezione casella','radio'=>'Pulsante di opzione','checkbox'=>'Casella di spunta','date'=>'Data','print'=>'Pulsante stampa'];
@endphp
<div class="outter-wp">

    <div class="sub-heard-part">

        <ol class="breadcrumb m-b-0">
            <li><a href="{{url('admin/schede-eye-visit')}}">{{ __('patient.Eye Visit Tabs') }}</a></li>
            @if($tabsData->id != 3)
            <li class="active">{{ __('patient.Tab Inputs') }}</li>
            @else
            <li class="active"><a href="{{ !empty($refrizione)?url('admin/ingressi-scheda/3'):'javascript:void(0);'}}">Refrazione Elenco di input {{ !empty($refrizione)?' - '.$refrizione:'' }}</a></li>
            @endif
        </ol>

    </div>
    <center><h2>{{ $tabsData->title.(!empty($refrizione)?' - '.$refrizione:'') }}</h2></center>
    <div class="graph-visual inputles-main">
        @if($tabsData->id != 3)
        <a href="{{url('admin/aggiungi-ingressi/'.$tabsData->id)}}" class="btn blue">{{ __('patient.Add Input') }} </a>
        @endif
        <div class="graph">

            <div class="inputles">

                @if (Session::has('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{Session::get('success') }}</strong>

                </div>

                @endif
                @if(($tabsData->id != 3) || !empty($refrizione))
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>{{ __('patient.Title') }}</th>
                            <th>{{ __('patient.Type') }}</th>
                            <th>{{ __('patient.Action') }}</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 

				 		$i='1';

				 		?>

                            @foreach($inputTabs as $input)

                            <tr>

                                <td>{{$i}}</td>
                                <td>{{ !empty($input->title)?$input->title:'NA' }}</td>
                                <td>
                                    {{ !empty($input->type)?$iArray[$input->type]:'NA' }}
                                </td>
                                <td>

                                    <a class="btn btn-info btn-sm" href="{{url('admin/modifica-ingressi/'.$tabsData->id.'/'.$input->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <a class="btn btn-danger btn-sm" href="{{url('admin/elimina-ingressi/'.$tabsData->id.'/'.$input->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare input?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                </td>

                            </tr>

                            <?php $i++;?>

                            @endforeach

                    </tbody>

                </table>
                @else
                @php $inputArray = ['LONTANO','VICINO','LAC','MIOSI','CICLO','FORO ST','INTERMEDIO']; @endphp
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>S.No</th>
                            <th>{{ __('patient.Title') }}</th>
                            <th>Ingressi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $rCounter = 1; @endphp
                        @foreach($inputArray as $input)
                        <tr>
                            <td>{{ $rCounter }}</td>
                            <td>{{ $input }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{url('admin/ingressi-scheda/3/'.$input)}}"><i class="fa fa-list" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @php  $rCounter++; @endphp
                        @endforeach
                        
                    </tbody>
                </table>
                @endif
            </div>

        </div>

    </div>

</div>

@endsection							

