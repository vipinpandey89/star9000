@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')

<div class="outter-wp">

    <div class="sub-heard-part">

        <ol class="breadcrumb m-b-0">

            <li><a href="{{url('admin/dashboard')}}">Home</a></li>
            <li><a href="{{url('admin/schede-eye-visit')}}">{{ __('patient.Eye Visit Tabs') }}</a></li>
            <li class="active">{{ __('patient.Tab Inputs') }}</li>
        </ol>

    </div>
    <center><h2>{{ $tabsData->title }}</h2></center>
    <div class="graph-visual inputles-main">

        <a href="{{url('admin/aggiungi-ingressi/'.$tabsData->id)}}" class="btn blue">{{ __('patient.Add Input') }} </a>

        <div class="graph">

            <div class="inputles">

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
                                    {{ !empty($input->type)?$input->type:'NA' }}
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

            </div>

        </div>

    </div>

</div>

@endsection							

