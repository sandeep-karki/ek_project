@extends('layouts.system')

@section('title', 'Edit Page')

@section('content')
  <div class="breadcrumb-section clearfix">
    <ol class="breadcrumb">
      <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
      <li><a href="{{URL::to(PREFIX.'/page')}}" >{{ translate('Pages') }}</a></li>
      <li class="active">{{ translate('Edit Page') }}</li>
    </ol>
  </div>
<div id="page-title">
  <h2>{{ translate('Edit Page') }}</h2>
</div>



@include('errors/errors')


<div class="panel panel-default">

  <div class="panel-body">
    {!!Form::model($data,['method'=>'PUT','route'=>['page.update',$data->id],'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}
    {{--{!!Form::open(['method'=>'POST','url'=>PREFIX.'/page/update', 'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}--}}
    <input type="hidden" name="id" value="{{$data->id}}">

    <div class="form-group" style="border-top:0px;">
      <label for="name" class="col-sm-2 control-label require">{{ translate('Title') }}</label>
      <div class="col-sm-10">
        <input class="form-control" name="title" type="text" id="head_title" value="{{$data->getPageTitle($data->id)}}">
      </div>
    </div>
    <div class="form-group">
      <label for="name" class="col-sm-2 control-label require">{{ translate('Slug') }}</label>
      <div class="col-sm-10">
        @if($data->slug=="about-hospital")
        <input class="form-control" name="slug" type="text" id="slug" value="{{$data->slug}}" readonly>
        @else
        <input class="form-control" name="slug" type="text" id="slug" value="{{$data->slug}}" @if($data->slug=="department") readonly="readonly" @endif>
        @endif
      </div>
    </div>



    @if($data->parent_id!=0)
    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Select Parent') }}</label>
      <div class="col-sm-10">
        <select class="form-control" name="parent_id">
          <option value="0">{{ translate('Select a Parent Page') }}</option>
          @foreach($pageParent as $pgTitle)
          <option value="{{$pgTitle->id}}" style="text-transform: capitalize;" @if($data->parent_id==$pgTitle->id){{"selected"}}@endif>{{$pgTitle->getPageTitle($pgTitle->id)}}</option>
          @endforeach
        </select>
      </div>
    </div>
    @else
    <input type="hidden" name="parent_id" value="0">
    @endif
    <div class="form-group">
      <label class="col-sm-2 control-label">{{ translate('Select Gallery') }}</label>
      <div class="col-sm-5">
        <select class="form-control" name="gallery_id">
          <option value="0">{{ translate('Select a Gallery') }}</option>
          @foreach($galleries as $d)
          @php
          $title=$d->getGalleryLangContent($d->id)->title;
          @endphp
          <option value="{{$d->id}}" style="text-transform: capitalize;" @if($d->id==$data->gallery_id) selected="selected" @endif>{{$title}}</option>
          @endforeach
        </select>
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
   {{--  <div class="form-group" >
      <label class="col-sm-2 control-label">{{translate('Enable Banner') }}</label>
      @if($data->enable_banner== Null)
      <div class="col-sm-10">
        <label class="radio-inline">
          <input id="active" name="enable_banner" value="yes" type="radio">
          {{translate('Yes') }}
        </label>
        <label class="radio-inline">
          <input id="inactive" name="enable_banner" value="no" type="radio" checked="checked" >
          {{translate('No') }}
        </label>
      </div>
      @else
      <div class="col-sm-10">
        <label class="radio-inline">
          <input id="active" name="enable_banner" value="yes" type="radio" @if($data->enable_banner=='yes'){{"checked"}}@endif>
          {{translate('Yes') }}
        </label>
        <label class="radio-inline">
          <input id="inactive" name="enable_banner" value="no" type="radio" @if($data->enable_banner=='no'){{"checked"}}@endif >
          {{translate('No') }}
        </label>
      </div>
      @endif

    </div> --}}


    <div class="form-group" style="border-bottom:1px dashed #dfe8f1;padding-bottom: 20px;">
      <label for="name" class="col-sm-2 control-label require">{{translate('Position')}}</label>
      <div class="col-sm-4">
        <input class="form-control" name="position" type="number" id="position" value="{{$data->position}}">
      </div>
    </div>

    <div class="row" style="margin:40px 0px;">
      <div class="col-md-12">
        @include('system.pages.editLangTabs',['flags'=>$langCategories])
      </div>

    </div>

    <div class="form-group">
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">{{ translate('Update') }}</button>
        <a class="btn btn-warning" href="{{URL::to(PREFIX.'/page')}}">{{ translate('Cancel') }}</a>

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


@stop
