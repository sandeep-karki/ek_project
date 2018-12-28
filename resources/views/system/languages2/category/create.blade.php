@extends('layouts.system')

@section('title', 'Add New Category')

@section('content')

<div id="page-title">
        <h2 style="display:inline-block">{{ translate('Add New Category') }}</h2>
        <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/langcategory')}}" >{{ translate('Language Category') }}</a></li>
    <li class="active">{{ translate('Add') }}</li>
  </ol>
</div>

 <div class="row">
    <div class="panel">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/langcategory', 'method'=>'POST', 'class'=>'form-horizontal bordered-row')) !!}

          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-2 control-label">Name *:</label>
              <div class="col-sm-10">
                  {{ Form::text('name', null, array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Name')) }}
                  @if($errors->any())
                      <label class="error" for="name">{{$errors->first('name')}}</label>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Save') }}</button>
                  <a href="{{URL::to(PREFIX.'/langcategory')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>

        {!! Form::close()!!}

        <div class="clearfix"></div>

      </div>
    </div>
  </div>


@stop

@section('scripts')


@stop
