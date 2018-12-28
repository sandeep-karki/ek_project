@extends('layouts.system')

@section('content')

    <div class="breadcrumb-section clearfix">
        <ol class="breadcrumb">
            <li><a href="{{URL::to(PREFIX.'/home')}}">{{('Home')}}</a></li>
            <li class="active">{{($title)}}</li>
        </ol>
    </div>

    <div id="page-title">
        <h2>{{($title)}}</h2>
    </div>

    @include('errors.errors')

    <div class="panel">
        <div class="panel-body">
            {!!Form::open(['method'=>'GET','url'=>PREFIX.'/apiusers', 'class'=>'form-horizontal'])!!}
            <div class="form-group">

                <div class="col-sm-3"></div>
                <div class="col-md-4"></div>
                <label class="col-sm-2 control-label">{{('Search')}}</label>
                <div class="col-md-3">
                    <div class="input-group">

                        <input type="text" class="form-control" name="keywords" value="{{\Illuminate\Support\Facades\Request::get('keywords')}}" autocomplete="off">
                        <span class="input-group-btn">
                  <button class="btn btn-primary" type="submit">{{('Go')}}!</button>
              </span>

                    </div>
                </div>
            </div>
            {!!Form::close() !!}
            <div class="example-box-wrapper">
                <div class="scroll-columns">
                    <table class="table table-bordered table-striped table-condensed cf" data-toggle="dataTable" data-form="deleteForm">
                        <thead class="cf">
                        <tr>
                            <th>{{('S.N.')}}</th>
                            <th></th>
                            <th>{{('Name')}}</th>
                            <th>{{('Email')}}</th>
                            <th>{{('Gender')}}</th>
                            <th>{{('Phone number')}}</th>
                            <th>{{('Type')}}</th>
                            <th>{{('Date')}}</th>
                            {{--@if(Auth::guard('web')->user()->canDo('user.role.delete') || Auth::guard('web')->user()->canDo('user.role.edit'))--}}
                                {{--<th>{{('Action')}}</th>--}}
                            {{--@endif--}}
                        </tr>
                        </thead>
                        <tbody>
                        @if($data->isEmpty())
                            <tr>

                                <td class="no-data" colspan="8">
                                    <b>{{('No data to display!')}}</b>
                                </td>
                            </tr>
                        @else
                            @php  $a=$data->perPage() * ($data->currentPage()-1); @endphp
                            @foreach($data as $d)
                                @php $a++;@endphp
                            <tr>
                                <td>{{ $a }}</td>
                                <td>
                                    <div class="col-md-1 fileinput-preview thumbnail" data-trigger="fileinput" style="width: 50px; height: 50px; display: inline-block;">
                                        @if($d->profile_picture == null) NA @else
                                            <img src="{{$d->profile_picture}}"  >
                                        @endif
                                    </div>
                                </td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->gender}}</td>
                                <td>{{$d->phone_number}}</td>
                                <td>{{$d->type}}</td>
                                <td>{{$d->created_at}}</td>

                            </tr>
                        @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            @if(!$data->isEmpty())
                <div class="pagination-tile"> <label class="pagination-sub">{{('Showing')}} {{($data->currentpage()-1)*$data->perpage()+1}} {{('to')}} {{(($data->currentpage()-1)*$data->perpage())+$data->count()}} {{('of')}} {{$data->total()}} {{('entries')}}</label>
                    <ul class="pagination" style="float:right ; margin:0px;">
                        {!! str_replace('/?', '?',$data->appends(['keywords'=>\Illuminate\Support\Facades\Request::get('keywords')])->render()) !!}

                    </ul>
                </div>
            @endif
            <div class="clearfix"></div>

        </div>
    </div>

@stop

@section('scripts')

@stop
