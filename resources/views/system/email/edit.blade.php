@extends('layouts.system')
@section('title','Edit '.$title)
@section('content')
  <ol class="breadcrumb">
    <li><a href="#">{{translate('Home')}}</a></li>
    <li><a href="{{URL::to(PREFIX.'/email')}}" >{{translate($pageTitle)}}</a></li>
    <li>{{translate($title)}}</li>
  </ol>
  <div id="page-title">
    <h2>{{translate($pageTitle)}}</h2>
  </div>


  @include('errors/errors')

  <div class="panel panel-default">
    <div class="panel-body">
      {!!Form::open(['method'=>'PUT','url'=>PREFIX.'/email/'.$emailTemplate->id, 'class'=>'form-horizontal bordered-row'])!!}
      <div class="form-group" style="border-top: 0px;">
        <label class="col-sm-2 control-label require">{{translate('Title')}}</label>
        <div class="col-sm-6">
          <input type="text" name="title" placeholder="{{translate('Template Title')}}" class="form-control" value="{{$emailTemplate->title}}">
        </div>
      </div>
      <div class="form-group" >
        <label class="col-sm-2 control-label require" >{{translate('Code')}}</label>
        <div class="col-sm-6">
          <input type="text" name="code" placeholder="{{translate('Unique code e.g. "unique_code"')}}" readonly class="form-control" value="{{$emailTemplate->code}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label require">{{translate('Subject')}}</label>
        <div class="col-sm-6">
          <input type="text" name="subject" placeholder="{{translate('Email Subject')}}" class="form-control" value="{{$emailTemplate->subject}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label require">{{translate('From')}}</label>
        <div class="col-sm-6">
          <input type="text" name="from" placeholder="{{translate('From')}}" class="form-control" value="{{$emailTemplate->from}}">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label require">{{translate('Email Template')}}</label>
        <div class="col-md-10">
          <textarea name="template" id="email-template" class="form-control">{{$emailTemplate->template}}</textarea>
        </div>
      </div>




      <div class="form-group">
        <div class="col-lg-offset-2 col-lg-6">
          <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Save') }}</button>
          <a href="{{URL::to(PREFIX.'/email')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
        </div>
      </div>

      {!!Form::close() !!}
      <div class="clearfix"></div>

    </div>
  </div>

@stop

@section('scripts')

  <script type="text/javascript">
      CKEDITOR.replace('template');
  </script>
@stop
