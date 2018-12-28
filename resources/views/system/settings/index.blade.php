@extends('layouts.system')
@section('title', $pageTitle)
@section('content')
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
        <li class="active">{{translate($pageTitle)}}</li>
    </ol>

    <div class="page-head clearfix">
        <div class="row">
            <div class="col-xs-9">
                <div class="head-title">
                    <h4>{{translate($pageTitle) }}</h4>
                </div><!-- ends head-title -->
            </div>
            @if($data['createPermission'])
            <div class="col-xs-3">
                <button type="submit" class="btn btn-success pull-right" id="addNew"><i class="fa fa-plus"></i> Add New</button>
            </div>
                @endif
        </div>
    </div>
    <div class="panel panel-default" id="addNewpanel" style="display: none;">
        <div class="panel-body">

            {!! Form::open(array('url' => PREFIX.'/settings', 'method'=>'POST', 'class'=>'form-horizontal bordered-row', 'files'=>true, 'enctype'=>'multipart/form-data')) !!}



            <div class="form-group">
                <label class="col-sm-2 control-label">Label *:</label>
                <div class="col-sm-10">
                    {{ Form::text('label', null, array('id' => 'label', 'class' => 'form-control', 'placeholder' => 'Label')) }}
                    {{--@if($errors->any())--}}
                        {{--<label class="error" for="name">{{$errors->first('label')}}</label>--}}
                    {{--@endif--}}
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Type *:</label>
                <div class="col-sm-10">
                    <select name="type" class="form-control" id="type">
                        <option value="text">Text</option>
                        <option value="textarea">Textarea</option>
                        <option value="number">Number</option>
                        <option value="file">File</option>
                    </select>

                    {{--@if($errors->any())--}}
                        {{--<label class="error" for="type">{{$errors->first('type')}}</label>--}}
                    {{--@endif--}}
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-6">
                    <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Save') }}</button>
                    <a href="{{URL::to(PREFIX.'/languages')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
                </div>
            </div>

            {!! Form::close()!!}

        </div>
    </div>

    @include('errors.errors')
    <div class="panel panel-default">
        <div class="panel-body">
            {!!Form::open(['files'=>'true','method'=>'PUT','url' => PREFIX.'/settings', 'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}
            @foreach($fields as $f)
                <div class="form-group">
                    <label class="col-sm-3 control-label">{{$f->label}} <span>( ID = {{$f->id}} )</span> : </label>
                    <div class="col-sm-6">
                        @if($f->type=='textarea')
                            <textarea class="form-control" name="field_{{$f->id}}" >{{$f->value}}</textarea>
                            @elseif($f->type=='color')
                            <input name="field_{{$f->id}}" class="form-control jscolor {hash:true}" value="{{$f->value}}" >
                            @else
                                <input type="{{$f->type}}" name="field_{{$f->id}}" class="form-control" value="{{$f->value}}" >
                                @if(!empty($f->value) && file_exists(public_path().'/uploads/settings/'.$f->value))
                                    <div style="margin-top:15px">
                                    <a href="{{asset('/uploads/settings/'.$f->value)}}" target="_blank">
                                        {{$f->value}}
                                    </a>
                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to(PREFIX.'/settings/destroyImage/'.$f->id)}}" class="btn btn-sm btn-danger" style="margin-left: 15px;"><i class="glyph-icon icon-trash"></i></a>
                                    </div>
                                        @endif
                        @endif
                    </div>
                    @if($f->id > 3)
                        @if($data['destroyPermission'])
                    <div class="col-sm-2">
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to(PREFIX.'/settings/'.$f->id)}}" class="btn btn-sm btn-danger"><i class="glyph-icon icon-trash"></i></a>
                    </div>
                            @endif
                        @endif
                </div>
            @endforeach
            @if($data['editPermission'])
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok" style="margin-right:10px;"></i>Save</button>
                </div>
            </div>
            @endif

            {!! Form::close() !!}
        </div>
    </div>

@stop
@section('scripts')
    @include('system.shared.preview-image')
    @include('system.shared.confirm-delete')
    <script src="{{asset('colorpicker/jscolor.js')}}"></script>
    <style>
        .control-label > span{
            font-weight: 300;
        }
    </style>
@stop