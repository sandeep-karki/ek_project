@extends('layouts.system')

@section('title', 'Add Photo')

@section('content')

<div id="page-title">
  <h2 style="display:inline-block">{{ translate('Add New Photo') }}</h2>

  <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
 @php
 $gallery_name=$galleryPhoto->getGalleryLangContent($galleryPhoto->id);@endphp
 <ol class="breadcrumb">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/gallery')}}" >{{translate('Gallery')  }}</a></li>
    @if(Input::get('gallery_id'))
    <li><a href="{{URL::to(PREFIX.'/gallery/pages/photo?gallery_id='.Input::get('gallery_id'))}}" >Photos</a></li>
    @else
    <li><a href="{{URL::to(PREFIX.'/gallery/pages/photo')}}" >{{ translate('Photos') }}</a></li>
    @endif

    <li class="active">{{translate('Add photo for ')}} {{$gallery_name->title}}</li>
  </ol>
</div>

@include('errors/errors')


<div class="panel">

  <div class="panel-body">
    {!!Form::open(['method'=>'POST','url'=>PREFIX.'/gallery/pages/photo/store', 'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}
    <input type="hidden" name="root_id" value="{{$gallery_id}}">
    <div class="form-group" style="border-top: 0px;">
      <label class="col-sm-2 control-label">{{ translate('Upload Gallery Image*') }}</label>
      <div class="col-sm-5">
        <input type="file" class="form-control" id="image" name="image" placeholder="" value="{{Input::old('image')}}">

      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Select Gallery') }}</label>
      <div class="col-sm-5">
        <select class="form-control" name="gallery_id">
          <option value="0">{{ translate('Select a Gallery') }}</option>

          @foreach($gallery as $pgTitle)
          <option value="{{$pgTitle->id}}" style="text-transform: capitalize;" @if(Input::get('gallery_id')==$pgTitle->id){{"selected"}}@endif>{{$pgTitle->getGalleryLangContent($pgTitle->id)->title}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group" >
      <label class="col-sm-2 control-label">{{ translate('Status') }}</label>
      <div class="col-sm-4">
        <label class="radio-inline">
          <input id="active" name="status" value="active" type="radio" @if(Input::old('status')=='active'){{"checked"}}@endif checked="checked">
          {{ translate('Active') }}
        </label>
        <label class="radio-inline">
          <input id="inactive" name="status" value="inactive" type="radio" @if(Input::old('status')=='inactive'){{"checked"}}@endif>
          {{ translate('Inactive') }}
        </label>
      </div>
    </div>

    <div class="form-group" style="border-bottom:1px dashed #dfe8f1;">
      <label for="name" class="col-sm-2 control-label">{{translate('Position')}}*</label>
      <div class="col-sm-2">
        <input class="form-control" name="position" type="number" id="position" value="{{Input::old('position')}}">
      </div>
    </div>

    <div class="row" style="margin: 40px 0px;">
      <div class="col-md-12">
        @include('system.photo.createLangTabs',['flags'=>$langCategories])
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ translate('Add') }}</button>
        <a class="btn btn-warning" href="{{URL::to(PREFIX.'/gallery/pages/photo?gallery_id=' . Input::get('gallery_id'))}}">{{ translate('Cancel') }}</a>

      </div>
    </div>

    {!!Form::close() !!}
    <div class="clearfix"></div>
  </div>
</div>


@stop

@section('scripts')


<script type="text/javascript">
  $("#head_title").keyup(function(){
    $("#lblValue").val(this.value);
  });
</script>


@stop
