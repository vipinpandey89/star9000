@extends('admin.layout.layout')

@section('title','dasbhoard')

@section('content')

<div class="outter-wp">

    <div class="sub-heard-part">

        <ol class="breadcrumb m-b-0">
            <li class="active">{{ __('patient.Eye Visit Tabs') }}</li>

        </ol>

    </div>

    <div class="graph-visual tables-main">

        <a href="{{url('admin/aggiungi-scheda')}}" class="btn blue">{{ __('patient.Add Tab') }} </a>

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
                            <th>{{ __('patient.Title') }}</th>
                            <th>{{ __('patient.Inputs') }}</th>
                            <th>{{ __('patient.Action') }}</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 

				 		$i='1';

				 		?>

                            @foreach($eyeVisitTabs as $tab)

                            <tr>

                                <td>{{$i}}</td>
                                <td>{{ !empty($tab->title)?$tab->title:'NA' }}</td>
                                <td>
                                    <a class="btn btn-info btn-sm" href="{{url('admin/ingressi-scheda/'.$tab->id)}}"><i class="fa fa-list" aria-hidden="true"></i></a>
                                </td>
                                <td>

                                    <a class="btn btn-info btn-sm" href="{{url('admin/modifica-scheda/'.$tab->id)}}" title="modificare"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                    <a class="btn btn-danger btn-sm" href="{{url('admin/elimina-scheda/'.$tab->id)}}" title="Elimina" onclick="return confirm('Sei sicuro di voler eliminare scheda?')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

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

