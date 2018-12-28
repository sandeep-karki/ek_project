@extends('layouts.system')
@section('title',translate($pagetitle))

@section('content')
<ol class="breadcrumb">
  <li><a href="{{URL::to(PREFIX.'/home')}}">{{('Home')}}</a></li>
  <li><a href="{{URL::to(PREFIX.'/news')}}" >{{('News List')}}</a></li>
  <li class="active">{{($pagetitle)}}</li>
</ol>

<div id="page-title">
  <h2>{{$pagetitle}}</h2>
</div>

@include('errors/errors')
<div class="panel panel-default">
  <div class="panel-body">

    {!!Form::open(['method'=>'POST','url'=>PREFIX.'/news', 'class'=>'form-horizontal','enctype'=>"multipart/form-data"])!!}
    <div class="form-group">
      <label for="name" class="col-sm-2 col-sm-2 control-label require">Title :</label>
      <div class="col-sm-6">
        <input class="form-control" name="title" type="text" id="title">
      </div>
    </div>

    <div class="form-group">
      <label for="name" class="col-sm-2 col-sm-2 control-label require">Description :</label>
      <div class="col-sm-6">
        <textarea class="form-control" name="description" id="description"></textarea>
      </div>
    </div>

    {{-- <div class="form-group">
        <label for="source" class="col-sm-2 col-sm-2 control-label require">Source <span style="color:red;">*</span>:</label>
        <div class="col-sm-6">
          <input class="form-control" name="" type="text" id="source">
        </div>
      </div> --}}

    <div class="form-group">
      <label for="date" class="col-sm-2 col-sm-2 control-label require">Date :</label>
      <div class="col-sm-6">
        <input class="form-control" name="date" type="date" id="date">
      </div>
    </div>

    <div class="form-group">
      <label for="category" class="col-sm-2 col-sm-2 control-label require">Category </label>
      <div class="col-sm-6">
        <input class="form-control" name="category" type="text" id="category">
      </div>
    </div>

    <div class="form-group">
      <label for="image" class="col-sm-2 col-sm-2 control-label require">Image </label>
      <div class="col-sm-6">
        <input  name="image" type="file" id="image">
      </div>
    </div>

{{--     <div class="form-group">
      <label for="status" class="col-sm-2 col-sm-2 control-label require">Category </label>
      <div class="col-sm-6">
        <input class="form-control" name="category" type="text" id="source">
      </div>
    </div>
 --}}


  {{--   <div class="form-group">
      <label for="name" class="col-sm-2 col-sm-2 control-label require">Image <span style="color:red;">*</span>:</label>
      <div class="col-sm-6">
        <input type="file" name="image">
      </div>
    </div>
 --}}
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-12">
            <button type="submit"  class="btn btn-primary">Add</button>
            <a class="btn btn-warning" href="{{URL::to(PREFIX.'/news')}}">Cancel</a>

          </div>
        </div>
        {!!Form::close()!!}
      </div>
    </div>
    
    @stop