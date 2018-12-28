@extends('layouts.system')

@section('title', $pageTitle)

@section('content')
  <div class="breadcrumb-section clearfix">
    <ol class="breadcrumb">
      <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
      <li><a href="{{URL::to(PREFIX.'/page')}}" >{{ translate('Pages') }}</a></li>
      <li class="active">{{ translate('Add Page') }}</li>
    </ol>
  </div>
<div id="page-title">
  <h2 style="display:inline-block">{{ translate('Add New Page') }}</h2>

  <div class="clearfix"></div>
</div>



@include('errors/errors')


<div class="panel panel-default">

  <div class="panel-body">
    {!!Form::open(['method'=>'POST','route'=>['page.store'],  'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}
    <div class="form-group" style="border-top: 0px;">
      <label for="name" class="col-sm-2 control-label require">{{ translate('Title') }}</label>
      <div class="col-sm-10">
        <input class="form-control" name="title" type="text" id="head_title" value="{{Input::old('title')}}">
      </div>
    </div>
    <div class="form-group">
      <label for="name" class="col-sm-2 control-label require">{{ translate('Slug') }}</label>
      <div class="col-sm-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{Input::old('slug')}}">
      </div>
    </div>


    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Select Parent') }}</label>
      <div class="col-sm-5">
        <select class="form-control" name="parent_id">
          <option value="0">{{ translate('Select a Parent Page') }}</option>
          @foreach($pageParent as $pgTitle)
          <option value="{{$pgTitle->id}}" style="text-transform: capitalize;">{{$pgTitle->getPageTitle($pgTitle->id)}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Select Gallery') }}</label>
      <div class="col-sm-5">
        <select class="form-control" name="gallery_id">
          <option value="0">{{ translate('Select a Gallery') }}</option>
          @foreach($galleries as $d)
          @php
          $title1=$d->getGalleryLangContent($d->id)->title;
          @endphp
          <option value="{{$d->id}}" style="text-transform: capitalize;">{{$title1}}</option>
          @endforeach
        </select>
      </div>
    </div>



    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Status') }}</label>
      <div class="col-sm-8">
        <label class="radio-inline">
          <input id="active" name="status" value="active" type="radio" @if(Input::old('status')=='active'){{"checked"}}@endif checked="checked">
          {{ translate('active') }}
        </label>
        <label class="radio-inline">
          <input id="inactive" name="status" value="inactive" type="radio" @if(Input::old('status')=='inactive'){{"checked"}}@endif >
          {{ translate('inactive') }}
        </label>
      </div>
    </div>


    <div class="form-group" style="border-bottom:1px dashed #dfe8f1; padding-bottom: 20px;">
      <label for="name" class="col-sm-2 control-label require">{{ translate('Position') }}</label>
      <div class="col-sm-2">
        <input class="form-control" name="position" type="number"  id="position" value="{{Input::old('position')}}">
      </div>
    </div>

    <div class="row" style="margin:40px 0px;">
      <div class="col-md-12">
        @include('system.pages.createLangTabs',['flags'=>$langCategories])
      </div>

    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ translate('Add') }}</button>
        <a class="btn btn-warning" href="{{URL::to(PREFIX.'/page')}}" onclick="history.go(-1);">{{ translate('Cancel') }}</a>

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

{{-- @include('backend.shared.slugify')
 --}}
<script type="text/javascript">
  $("#head_title").keyup(function(){
    $("#lblValue").val(this.value);
  });

  $("#lblValue").keyup(function(){
    $("#head_title").val(this.value);
  });
</script>
</script>


@stop
