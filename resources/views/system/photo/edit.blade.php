@extends('layouts.system')

@section('title', 'Edit Photo')

@section('content')

<div id="page-title">
  <h2 style="display:inline-block">{{ translate('Edit Photo') }}</h2>

  <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
   @php
   $gallery_name=$galleryPhoto->getGalleryLangContent($galleryPhoto->id);@endphp
   <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
   <li><a href="{{URL::to(PREFIX.'/gallery')}}" >{{ translate('Gallery') }}</a></li>
   @if(Input::get('gallery_id'))
   <li><a href="{{URL::to(PREFIX.'/gallery/pages/photo?gallery_id='.Input::get('gallery_id'))}}" >Photos</a></li>
   @else
   <li><a href="{{URL::to(PREFIX.'/gallery/pages/photo')}}" >{{ translate('Photos') }}</a></li>
   @endif
   <li class="active">{{translate('Edit photo for ')}} {{$gallery_name->title}}</li>
 </ol>
</div>

@include('errors/errors')


<div class="panel">

  <div class="panel-body">
    {!!Form::open(['method'=>'POST','url'=>PREFIX.'/photo/update', 'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="form-group" style="border-top: 0px;">
      <label class="col-sm-2 control-label">{{ translate('Upload Gallery Image') }}*</label>
      <div class="col-sm-5">
        <input type="file" class="form-control" name="image" placeholder="">

        <div class="fileinput fileinput-new" data-provides="fileinput">
          @if(!empty($data->image) && file_exists('uploads/photos/'.$data->image))
          <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: margin-top:10px;">
            <img src="{{URL::asset('uploads/photos/'.$data->image)}}" >
          </div>
          @endif
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="" class="col-sm-2 control-label">{{ translate('Gallery') }}*</label>
      <div class="col-sm-5">
        <select class="form-control" name="gallery_id">
          <option value="0">{{ translate('Select a Gallery') }}</option>
          @foreach($galleryList as $gallery)
          <option value="{{$gallery->id}}" @if($gallery->id==$data->gallery_id){{"selected"}} @endif>{{$gallery->getGalleryLangContent($gallery->id)->title}}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Status') }}</label>
      <div class="col-sm-4">
        <label class="radio-inline">
          <input id="active" name="status" value="active" type="radio" @if($data->status=='active'){{"checked"}}@endif>
          {{ translate('Active') }}
        </label>
        <label class="radio-inline">
          <input id="inactive" name="status" value="inactive" type="radio" @if($data->status=='inactive'){{"checked"}}@endif>
          {{ translate('Inactive') }}
        </label>
      </div>
    </div>

    <div class="form-group" style="border-bottom:1px dashed #dfe8f1;">
      <label for="name" class="col-sm-2 control-label">{{ translate('Position') }}*</label>
      <div class="col-sm-4">
        <input class="form-control" name="position" type="number" id="position" value="{{$data->position}}">
      </div>
    </div>

    <div class="row" style="margin: 40px 0px;">
      <div class="col-md-12">
        @include('system.photo.editLangTabs',['flags'=>$langCategories])
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
        @if(Input::get('gallery_id'))
        <a class="btn btn-warning" href="{{URL::to(PREFIX.'/gallery/pages/photo?gallery_id='.Input::get('gallery_id'))}}">{{ translate('Cancel') }}</a>
        @else
        <a class="btn btn-warning" href="{{URL::to(PREFIX.'/gallery/pages/photos')}}">{{ translate('Cancel') }}</a>
        @endif
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
