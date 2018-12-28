@extends('layouts.system')
@section('title', 'Add New Language')

@section('content')

<div id="page-title">
        <h2 style="display:inline-block">{{ translate('Add New Language') }}</h2>
        <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/languages')}}" >{{ translate('Language') }}</a></li>
    <li class="active">{{ translate('Add') }}</li>
  </ol>
</div>

 <div class="row">
    <div class="panel">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/languages', 'method'=>'POST', 'class'=>'form-horizontal bordered-row', 'files'=>true, 'enctype'=>'multipart/form-data')) !!}

          <div class="form-group" style="border-top: 0px;">
            <label class="col-sm-2 control-label">Upload Flag :</label>
            <div class="col-sm-10">
              <input id="fileUpload" type="file" name="flag" class="form-control" />
              <div class="help-block"><i>Note: Flag size must be (128 x 128)px approximately.</i></div>
              @if($errors->any())
                  <label class="error" for="flag">{{$errors->first('flag')}}</label>
              @endif
            </div>
          </div>
          <div class="form-group" id="image-preview" style="display:none">
              <label class="col-sm-2 control-label">Image preview upload</label>
              <div class="col-sm-10">
                  <div id="image-holder"> </div>
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Name *:</label>
              <div class="col-sm-10">
                  {{ Form::text('name', null, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Name')) }}
                  @if($errors->any())
                      <label class="error" for="name">{{$errors->first('name')}}</label>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Short Code *:</label>
              <div class="col-sm-10">
                  {{ Form::text('short_code', null, array('class' => 'form-control', 'placeholder' => 'Short Code')) }}
                  @if($errors->any())
                      <label class="error" for="short_code">{{$errors->first('short_code')}}</label>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Save') }}</button>
                  <a href="{{URL::to(PREFIX.'/languages')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>
              
        {!! Form::close()!!} 
         
        <div class="clearfix"></div>  

      </div>
    </div>
  </div>


@stop

@section('scripts')
@include('system.shared.preview-image')

@stop
