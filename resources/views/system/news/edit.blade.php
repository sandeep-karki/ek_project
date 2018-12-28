@extends('layouts.system')

@section('title',$pagetitle)

@section('content')
<ol class="breadcrumb">
	<li><a href="{{URL::to(PREFIX.'/home')}}">{{('Home')}}</a></li>
	<li><a href="{{URL::to(PREFIX.'/news')}}" >{{('NewsList')}}</a></li>
	<li class="active">{{($pagetitle)}}</li>
</ol>

<div id="page-title">
	<h2>{{$pagetitle}}</h2>
</div>
@include('errors.errors')

<div class="panel panel-default">
	<div class="panel-body">

		{!!Form::open(['method'=>'PUT','url'=>PREFIX.'/news/'.$data->id, 'class'=>'form-horizontal','enctype'=>"multipart/form-data"])!!}
		<div class="form-group">
      <label for="name" class="col-sm-2 col-sm-2 control-label require">Title :</label>
      <div class="col-sm-6">
        <input class="form-control" name="title" type="text" @if(Input::old('title')!=null) value="{{Input::old('title')}}" @else
				value="{{$data->title}}" @endif id="head_title">
      </div>
    </div>

{{--     <div class="form-group">
      <label for="source" class="col-sm-2 col-sm-2 control-label require">Source :</label>
      <div class="col-sm-6">
        <input class="form-control" name="source" type="text" @if(Input::old('title')!=null) value="{{Input::old('title')}}" @else
        value="{{$data->newsSource->title}}" @endif id="source">
      </div>
    </div> --}}

      <div class="form-group">
        <label for="desc" class="col-sm-2 col-sm-2 control-label require">Description :</label>
        <div class="col-sm-6">
          <textarea class="form-control" name="description">@if(Input::old('description')!=null){{Input::old('description')}} 
            @else
          {{$data->description}}
        @endif</textarea>
        </div>
      </div>

      <div class="form-group">
        <label for="date" class="col-sm-2 col-sm-2 control-label require">Date:</label>
        <div class="col-sm-6">
          <input class="form-control" name="date" type="date" value="{{$data->date}}">

        </div>
      </div>

      <div class="form-group">
      <label for="source" class="col-sm-2 col-sm-2 control-label require">Category :</label>
      <div class="col-sm-6">
          <input class="form-control" name="category" type="text" id="category" value="{{$data->category}}">
      </div>
    </div>

    <div class="form-group">
      <label for="image" class="col-sm-2 col-sm-2 control-label require">Image </label>
      <div class="col-sm-6">
        <img src="{{ asset('/uploads/appsetting/' . $data->image) }}" style="width:100px; height:50px;" />
        <input  name="image" type="file" id="image">
      </div>
    </div>

{{-- 
      <div class="form-group">
        <label for="image" class="col-sm-2 col-sm-2 control-label require">Image:</label>
        <div class="col-sm-6 form-group">
      <input name="image" type="file" >
      <div class="img">
        @if(!empty($data->image))
          <img src={{$data->image}} class="img-fluid">
        @endif
      </div>
        </div>
      </div> --}}
        
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-12">
            <button type="submit"  class="btn btn-primary">Save</button>
            <a class="btn btn-warning" href="{{URL::to(PREFIX.'/news')}}">Cancel</a>

          </div>
        </div>
        {!!Form::close()!!}
      </div>
    </div>

			@stop










