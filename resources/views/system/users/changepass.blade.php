@extends('layouts.system')

@section('title', translate('Change Password'))

@section('content')
<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{translate('Home')}}</a></li>
    <li><a href="{{URL::to(PREFIX.'/user')}}" >{{translate('Users')}}</a></li>
    <li class="active">{{translate('Change Password')}}</li>
  </ol>
</div>

<div id="page-title">
        <h2 style="display:inline-block">{{translate('Change Password')}}</h2>
        <div class="clearfix"></div>
</div>



@include('errors.errors')

<div class="panel panel-default">
  <div class="panel-body">
      {!!Form::open(['method'=>'POST','url'=>PREFIX.'/user/update_password/'.Auth::user()->id, 'class'=>'form-horizontal bordered-row'])!!}
      <input type="hidden" name="id" value="{{$data->id}}">
      <div class="form-group">
        <label class="col-sm-3 control-label require">New Password</label>
        <div class="col-sm-6">
            {!! Form::password('password',['class'=>"form-control"]) !!}
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label require">Retype Password</label>
        <div class="col-sm-6">
            {!! Form::password('password_confirmation',['class'=>"form-control"]) !!}
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-6">
          <div class="pull-right">
            <a class="btn btn-primary" href="{{URL::to(PREFIX.'/user')}}"><i class="glyphicon glyphicon-chevron-left" style="margin-right:10px;"></i>{{translate('Back')}}</a>
            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok" style="margin-right:10px;"></i>{{translate('Save')}}</button>
          </div>
        </div>
      </div>
      {!!Form::close() !!}
      <div class="clearfix"></div>

    </div>
</div>


@stop

@section('scripts')

@stop
