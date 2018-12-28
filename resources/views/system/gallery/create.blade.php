@extends('layouts.system')

@section('title', 'Add Gallery')

@section('content')
  <div class="breadcrumb-section clearfix">
    <ol class="breadcrumb">
      <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
      <li><a href="{{URL::to(PREFIX.'/gallery')}}" >{{ translate('Gallery') }}</a></li>
      <li class="active">Add Gallery</li>
    </ol>

<div id="page-title">
  <h2 >{{ translate('Add New Gallery') }}</h2>
</div>

</div>

@include('errors/errors')


<div class="panel panel-default">

  <div class="panel-body">

    {!!Form::open(['method'=>'POST','url'=>PREFIX.'/gallery/store', 'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}

    <div class="form-group" style="border-top:0px;">
      <label for="name" class="col-sm-2 control-label">{{ translate('Title')}}</label>
      <div class="col-sm-10">
        <input class="form-control" name="title" type="text" id="head_title" value="{{Input::old('title')}}">
      </div>
    </div>
    <div class="form-group">
      <label for="name" class="col-sm-2 control-label">{{ translate('Slug')}}</label>
      <div class="col-sm-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{Input::old('slug')}}">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Upload Gallery Image') }}</label>
      <div class="col-sm-5">
        <input type="file" class="form-control" id="image" name="image" placeholder="">

      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Status') }}</label>
      <div class="col-sm-8">
        <label class="radio-inline">
          <input id="active" name="status" value="active" type="radio" @if(Input::old('status')=='active'){{"checked"}}@endif checked="checked" >
          {{ translate('Active') }}
        </label>
        <label class="radio-inline">
          <input id="inactive" name="status" value="inactive" type="radio" @if(Input::old('status')=='inactive'){{"checked"}}@endif>
          {{ translate('Inactive') }}
        </label>
      </div>
    </div>
    <div class="form-group" style="border-bottom:1px dashed #dfe8f1; padding-bottom: 20px;">
      <label for="name" class="col-sm-2 control-label">{{ translate('Position') }}</label>
      <div class="col-sm-2">
        <input class="form-control" name="position" type="number" id="position" value="{{Input::old('position')}}">
      </div>
    </div>

    <div class="row" style="margin:40px 0px;">
      <div class="col-md-12">
        @include('system.gallery.createLangTabs',['flags'=>$langCategories])
      </div>

    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ translate('Add') }}</button>
        <a class="btn btn-warning" href="{{URL::to(PREFIX.'/gallery')}}" onclick="history.go(-1);">{{ translate('Cancel') }}</a>

      </div>
    </div>

    {!!Form::close() !!}
    <div class="clearfix"></div>
  </div>
</div>


@stop

@section('scripts')
@include('system.shared.slugify')
 @include('system.shared.text-editor')


<script type="text/javascript">
  $("#head_title").keyup(function(){
    $("#lblValue").val(this.value);
  });
  $("#lblValue").keyup(function(){
    $("#head_title").val(this.value);
  });
</script>


@stop
