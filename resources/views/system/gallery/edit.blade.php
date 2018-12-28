@extends('layouts.system')

@section('title', 'Edit Gallery')

@section('content')
  <div class="breadcrumb-section clearfix">
    <ol class="breadcrumb">
      <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
      <li><a href="{{URL::to(PREFIX.'/gallery')}}" >{{ translate('Gallery') }}</a></li>
      <li class="active">{{ translate('Edit Gallery') }}</li>
    </ol>
  </div>
<div id="page-title">
  <h2>{{ translate('Edit Gallery') }}</h2>
</div>



@include('errors/errors')


<div class="panel panel-default">


  <div class="panel-body">
    {!!Form::open(['method'=>'POST','url'=>PREFIX.'/gallery/update', 'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}
    <input type="hidden" name="id" value="{{$data->id}}">

    <div class="form-group" style="border-top:0px;">
      <label for="name" class="col-sm-2 control-label require">Title</label>
      <div class="col-sm-10">

        <input class="form-control" name="title" type="text" id="head_title"  @if($data->getGalleryLangContent($data->id)!=null)value="{{$data->getGalleryLangContent($data->id)->title}}" @else
        value="" @endif>
      </div>
    </div>
    <div class="form-group">
      <label for="name" class="col-sm-2 control-label require">{{ translate('Slug') }}</label>
      <div class="col-sm-10">
        <input class="form-control" name="slug" type="text" id="slug" value="{{$data->slug}}">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label require">{{ translate('Upload Gallery Image') }}</label>
      <div class="col-sm-5">
        <input type="file" class="form-control" name="image" placeholder="">

        <div class="fileinput fileinput-new" data-provides="fileinput">
          @if(!empty($data->image) && file_exists('uploads/gallery/'.$data->image))
          <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: margin-top:10px;">
            <img src="{{URL::asset('uploads/gallery/'.$data->image)}}" >
          </div>
          @endif
        </div>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Status') }}</label>
      <div class="col-sm-10">
        <label class="radio-inline">
          <input id="active" name="status" value="active" type="radio" @if($data->status =='active'){{"checked"}} @endif>
          {{ translate('Active') }}
        </label>
        <label class="radio-inline">
          <input id="inactive" name="status" value="inactive" type="radio" @if($data->status=='inactive'){{"checked"}}@endif>
          {{ translate('Inactive') }}
        </label>
      </div>
    </div>

    <div class="form-group" style="border-bottom:1px dashed #dfe8f1; padding-bottom: 20px;">
      <label for="name" class="col-sm-2 control-label require">{{ translate('Position') }}</label>
      <div class="col-sm-10">
        <input class="form-control" name="position" type="number" id="position" value="{{$data->position}}">
      </div>
    </div>

    <div class="row" style="margin:40px 0px;">
      <div class="col-md-12">
        @include('system.gallery.editLangTabs',['flags'=>$langCategories])
      </div>

    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
        <a class="btn btn-warning" href="{{URL::to(PREFIX.'/gallery')}}">{{ translate('Cancel')}}</a>

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

<script>
  CKEDITOR.replace('editor1');
</script>
<script type="text/javascript">
  $("#head_title").keyup(function(){
    $("#lblValue").val(this.value);
  });
  $("#lblValue").keyup(function(){
    $("#head_title").val(this.value);
  });
</script>


@stop
