@extends('layouts.system')

@section('title',$title)
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{translate('Home')}}</a></li>
        <li class="active">{{translate($pageTitle)}}</li>
    </ol>
    <div id="page-title">
        <h2 style="display:inline-block">{{translate($pageTitle)}}</h2>
    </div>

    @include('errors.errors')
    <div class="content-display clearfix">
        <div class="panel panel-default">
            <div class="panel-heading no-bdr">
                <div class="row">
                    <div class="col-sm-8">
                        {!!Form::open(['method'=>'GET','url'=>PREFIX.'/email', 'class'=>'form-inline'])!!}
                        <div class="form-group">
                            <input type="text" class="form-control"  name="keywords" value="{{Input::get('keywords')}}" autocomplete="off">
                        </div>

                        <button type="submit" class="btn btn-default">{{translate('Search')}}</button>
                        {!!Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="panel">
        <div class="panel-box">
                <div class="scroll-columns">
                    <table class="table table-bordered table-striped table-condensed cf" data-toggle="dataTable" data-form="deleteForm">
                        <thead class="cf">
                        <tr>

                            <th>Title</th>
                            <th>Code</th>
                            <th>Subject</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($emailTemplates->isEmpty())
                            <tr>
                                <td colspan="4">
                                    <p>No data to display</p>
                                </td>
                            </tr>
                        @else
                            @php  $a=$emailTemplates->perPage() * ($emailTemplates->currentPage()-1); @endphp
                            @foreach($emailTemplates as $template)

                                @php
                                    $a++;
                                @endphp
                                <tr>
                                    <td>{{$template->title}}</td>
                                    <td>{{$template->code }}</td>
                                    <td>{{$template->subject}} </td>
                                    <td>
                                        @if($editPermission|| $destroyPermission)

                                            @if($editPermission)
                                                <a class="btn  btn-sm btn-info btn_glyph" href="{{URL::to(PREFIX.'/email/'.$template->id.'/edit')}}"><i class="glyphicon glyphicon-edit"></i> {{translate('Edit')}}</a>
                                            @endif

                                            @if($destroyPermission)
                                                {!! Form::model($template, ['method' => 'DELETE', 'route' => ['email.destroy',$template->id] , 'class' =>'form-inline form-delete']) !!}
                                                    {!! Form::hidden('id', $template->id) !!}
                                                <button type="submit" data-toggle="modal" data-target="#confirm-delete" data-id="{{$template->id}}" class="btn btn-sm btn-danger confirm-delete" ><i class="glyphicon glyphicon-trash"></i> {{translate('Delete')}} </button>
                                                {!! Form::close() !!}
                                            @endif
                                        @endif
                                    </td>
                                </tr>

                            @endforeach
                        @endif
                        </tbody>
                    </table>
            </div>

            @if(!$emailTemplates->isEmpty())
                <div class="pagination-tile"> <label class="pagination-sub">{{translate('Showing')}} {{($emailTemplates->currentpage()-1)*$emailTemplates->perpage()+1}} {{translate('to')}} {{(($emailTemplates->currentpage()-1)*$emailTemplates->perpage())+$emailTemplates->count()}} {{translate('of')}} {{$emailTemplates->total()}} {{translate('entries')}}</label>
                    <ul class="pagination" style="float:right ; margin:0px;">
                        {!! str_replace('/?', '?',$emailTemplates->appends(['keywords'=>\Illuminate\Support\Facades\Request::get('keywords')])->render()) !!}

                    </ul>
                </div>
            @endif


            <div class="clearfix"></div>

        </div>
    </div>

@stop
