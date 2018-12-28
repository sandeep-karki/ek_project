@extends('layouts.system')

@section('title', $title)

@section('content')

        <ol class="breadcrumb">
            <li><a href="{{URL::to(PREFIX.'/home')}}">{{('Home')}}</a></li>
            <li class="active">{{($title)}}</li>
        </ol>

        <div class="page-head clearfix">
            <div class="row">
                <div class="col-xs-9">
                    <div class="head-title">
                        <h4>{{($title)}}</h4>
                    </div><!-- ends head-title -->
                </div>
                <div class="col-xs-3">
                    @if($permissions['createPermission'])
                        <a class="btn btn-success pull-right" href="{{URL::to(PREFIX.'/role/create')}}"><i class="glyph-icon icon-plus"></i>{{('Add New')}}</a>
                    @endif
                </div>
            </div>
        </div>

    @include('errors.errors')
        <div class="content-display clearfix">
            <div class="panel panel-default">
                <div class="panel-heading no-bdr">
                    <div class="row">
                        <div class="col-sm-8">
                            {!!Form::open(['method'=>'GET','url'=>PREFIX.'/role', 'class'=>'form-inline'])!!}
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="keywords" value="{{\Illuminate\Support\Facades\Request::get('keywords')}}" autocomplete="off">
                                </div>

                                <button type="submit" class="btn btn-default">{{('Search')}}</button>
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
                            <th>{{('S.N.')}}</th>
                            <th>{{('Name')}}</th>
                            @if($permissions['deletePermission']|| $permissions['editPermission'])
                                <th>{{('Action')}}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @if($data->isEmpty())
                            <tr>

                                <td class="no-data" colspan="5">
                                    <b>{{('No data to display!')}}</b>
                                </td>
                            </tr>
                        @else
                            @php  $a=$data->perPage() * ($data->currentPage()-1); @endphp
                            @foreach($data as $datum)
                                @php $a++;@endphp
                            <tr>
                                <td>{{ $a }}</td>
                                <td>{{$datum->name}}</td>
                                @if($permissions['deletePermission']|| $permissions['editPermission'])
                                    <td>
                                        @if($datum->name=='superuser')
                                            @if(Auth::guard('web')->user()->canDo('user.role.edit'))
                                                <a class="btn  btn-sm btn-info" href="#" disabled><i class="glyphicon glyphicon-edit"></i> {{('Edit')}}</a>
                                            @endif
                                            @if(Auth::guard('web')->user()->canDo('user.role.delete'))
                                                <a class="btn  btn-sm btn-danger" href="#" disabled><i class="glyphicon glyphicon-trash"></i> {{('Delete')}}</a>
                                            @endif
                                        @else
                                            @if($permissions['editPermission'])
                                                <a class="btn  btn-sm btn-info"  href="{{URL::to(PREFIX.'/role/'.$datum->id.'/edit')}}"><i class="glyphicon glyphicon-edit"></i> {{('Edit')}}</a>
                                            @endif
                                            @if($permissions['deletePermission'])
                                                    {!! Form::model($datum, ['method' => 'DELETE', 'route' => ['role.destroy',$datum->id] , 'class' =>'form-inline form-delete']) !!}
                                                    {!! Form::hidden('id', $datum->id) !!}
                                                    <button type="submit" data-toggle="modal" data-target="#confirm-delete" data-id="{{$datum->id}}" class="btn btn-sm btn-danger confirm-delete" ><i class="glyphicon glyphicon-trash"></i> {{translate('Delete')}} </button>
                                                    {!! Form::close() !!}
                                                @endif
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                            @endif
                        </tbody>
                    </table>
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


