@extends('layouts.system')
@section('title',$pageTitle)

@section('content')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <div id="page-title">
        <h2 style="display:inline-block">{{ $pageTitle }}</h2>
        <div class="right" style="float:right">
        </div>
    </div>

    <div class="breadcrumb-section clearfix">
        <ol class="breadcrumb">
            <li><a href="{{URL::to(PREFIX.'/home')}}">@lang('words.Home')</a></li>
            <li class="active">@lang('words.'.$pageTitle)</li>
        </ol>
    </div>

    @include('errors.errors')

    {{--{!!Form::open(['method'=>'GET','url'=>PREFIX.'/user', 'class'=>'form-horizontal'])!!}--}}
    {{--<div class="form-group">--}}

        {{--<div class="col-sm-3"></div>--}}
        {{--<div class="col-md-4"></div>--}}
        {{--<label class="col-sm-2 control-label">{{translate('Search')}}</label>--}}
        {{--<div class="col-md-3">--}}
            {{--<div class="input-group">--}}

                {{--<input type="text" class="form-control" name="keywords" value="{{Input::get('keywords')}}" autocomplete="off">--}}
                {{--<span class="input-group-btn">--}}
                  {{--<button class="btn btn-primary" type="submit">{{translate('Go')}}!</button>--}}
              {{--</span>--}}

            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--{!!Form::close() !!}--}}

    <div class="panel" style="width: 100%;">
        <div class="panel-body">
            {!!Form::open(['method'=>'GET','url'=>PREFIX.'/audit'])!!}
            <div class="col-md-3 pull-right" style="padding:0; margin: 10px 0 0 20px;">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="keywords" value="{{Input::get('keywords')}}" placeholder="Search" autocomplete="off">
                    {{--<span class="input-group-btn">--}}
                  {{--<button class="btn btn-primary" type="submit">{{translate('Go')}}!</button>--}}
              {{--</span>--}}
                </div>
            </div>
            {!!Form::close() !!}

            {!!Form::open(['method'=>'GET','url'=>PREFIX.'/audit', 'class'=>'form-horizontal', 'id' => 'moduleform'])!!}

            <div class="col-md-3 pull-right" style="padding:0; margin: 10px 0;">
                <div class="input-group">

                    {!! Form::select('module',$model,Input::get('module'),["class"=>"form-control","id"=>"moduleChange"]) !!}
                </div>
            </div>

            {!!Form::close() !!}
            <div class="example-box-wrapper">
                <div class="scroll-columns">
                    <table class="table table-striped" data-toggle="dataTable" data-form="deleteForm" id="tblOne">
                        <thead class="cf">
                        <tr>
                            <th>S.N.</th>
                            <th>Date</th>
                            <th>Username</th>
                            <th>Event</th>
                            <th>User Agent</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($audits->isEmpty())
                            <tr>
                                <td class="no-data" colspan="5">
                                    <b>@lang('words.No data to display!')</b>
                                </td>
                            </tr>
                        @else
                            @php  $a=$audits->perPage() * ($audits->currentPage()-1); @endphp
                            @foreach($audits as $datum)
                                @php
                                    $a++;
                                @endphp
                                @if(is_null(Input::get('module')) || Input::get('module') === 'OwenIt\Auditing\Models\Audit')

                                    @include('system.audit.includes.table-body')
                                @else
                                    @php $all = $datum->audits()->latest()->get(); @endphp
                                        @forelse ($all as $datum)
                                            @include('system.audit.includes.table-body')
                                        @empty
                                        @endforelse
                                @endif

                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            @if(!$audits->isEmpty())
                <div class="pagination-tile"> <label class="pagination-sub">Showing {{($audits->currentpage() - 1)*$audits->perpage()+1}} to {{(($audits->currentpage()-1)*$audits->perpage())+$audits->count()}} of {{$audits->total()}} entries</label>
                    <ul class="pagination" style="float:right ; margin:0px;">
                        {!! str_replace('/?', '?',$audits->appends(Input::except('page'))->render()) !!}

                    </ul>
                </div>
            @endif

            <div class="clearfix"></div>

        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#table-transssss').DataTable({
                "pageLength": 20
            });
        } );
    </script>

@stop

@section('scripts')
    <script type="text/javascript" src="{{ asset('js/audit.js')}}"></script>

@stop
