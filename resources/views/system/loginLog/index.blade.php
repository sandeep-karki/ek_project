@extends('layouts.system')
@section('title',translate($pageTitle))
@section('content')
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{translate('Home')}}</a></li>
        <li class="active">{{translate($pageTitle)}}</li>
    </ol>

    <div id="page-title">
        <h2>{{translate($pageTitle)}}</h2>
    </div>

    @include('errors.errors')
    <div class="content-display clearfix">
        <div class="panel panel-default">
            <div class="panel-heading no-bdr">
                <div class="row">
                    <div class="col-sm-8">
                        {!!Form::open(['method'=>'GET','url'=>PREFIX.'/loginLog', 'class'=>'form-inline', 'id'=>'searchform'])!!}
                        <div class="form-group">
                        <select class="form-control" name="user_id" onchange="submitForm();">
                            <option value="">Select User</option>
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @if($user->id == Input::get('user_id')){{'selected'}}@endif >{{$user->first_name.' '.$user->last_name}}</option>
                            @endforeach
                        </select>
                        </div>

                        {!!Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-box">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" data-toggle="dataTable" data-form="deleteForm">
                        <thead class="cf">
                        <tr>
                            <th>S.N.</th>
                            <th>{{translate('User')}}</th>
                            <th>{{translate('IP Address')}}</th>
                            <th>{{translate('Time')}}</th>
                            <th>{{translate('ISP')}}</th>
                            <th>{{translate('Location')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($data->isEmpty())
                            <tr>

                                <td class="no-data" colspan="5">
                                    <b>{{translate('No data to display!')}}</b>
                                </td>
                            </tr>
                        @else
                            @php  $a=$data->perPage() * ($data->currentPage()-1); @endphp
                            @foreach($data as $d)
                                @php $a++ @endphp
                                <tr>
                                    <td>{{ $a }}</td>
                                    <td>{{$d->getUserById($d->user_id)}}</td>
                                    <td>{{$d->ip}}</td>
                                    <td>{{$d->created_at}}</td>
                                    <td>{{$d->isp}}</td>
                                    <td>Latitude : {{$d->lat}}<br>
                                        Longitude : {{$d->lon}}<br>
                                        City : {{$d->city}}<br>
                                        Country : {{$d->country}}<br>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            @if(!$data->isEmpty())
                <div class="pagination-tile"> <label class="pagination-sub" style="display: block;">{{translate('Showing')}} {{($data->currentpage()-1)*$data->perpage()+1}} {{translate('to')}} {{(($data->currentpage()-1)*$data->perpage())+$data->count()}} {{translate('of')}} {{$data->total()}} {{translate('entries')}}</label>
                    <ul class="pagination">
                        {!! str_replace('/?', '?',$data->appends([ 'user_id' => Input::get('user_id')])->links()) !!}

                    </ul>
                </div>
            @endif
            <div class="clearfix"></div>

        </div>
    </div>


@stop

@section('scripts')

    <script>
        function submitForm() {
            $('#searchform').submit();
        }
    </script>

@stop
