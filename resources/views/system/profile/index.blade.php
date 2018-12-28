@extends('layouts.system')

@section('title', 'Templates Form View')

@section('content')
    <style>
        .control-label{
            text-align: left !important;
        }
    </style>
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{translate('Home')}}</a></li>
        <li><a href="{{URL::to(PREFIX.'/user')}}" >{{translate('Users')}}</a></li>
        <li class="active">{{translate('User Profile')}}</li>
    </ol>

    <div id="page-title">
        <h2>Profile
        </h2>
    </div>

    @include('errors.errors')


    <div class="panel panel-default">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6" >
                    <div id="page-title" style="margin-bottom: 30px;">
                        <h2>Change Password</h2>
                    </div>
                    {!!Form::open(['method'=>'POST','url'=>PREFIX.'/user/change_password/'.Auth::guard('web')->user()->id, 'class'=>'form-horizontal bordered-row'])!!}
                    <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}">

                    <div class="form-group" style="border-top: 0px;">
                        <label class="col-sm-4 control-label">Old Password</label>
                        <div class="col-sm-6">
                            {!! Form::password('old_password',['class'=>"form-control"]) !!}
                        </div>
                    </div>
                    <div class="form-group">

                        <label class="col-sm-4 control-label">New Password</label>
                        <div class="col-sm-6">
                            {!! Form::password('password',['class'=>"form-control"]) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">Confirm Password</label>
                        <div class="col-sm-6">
                            {!! Form::password('password_confirmation',['class'=>"form-control"]) !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-4 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok" style="margin-right:10px;"></i>Save</button>
                        </div>
                    </div>
                    {!!Form::close() !!}
                </div>
                @if(Auth::guard('web')->user()->id==1)
                <div class="col-md-6">
                    <div id="page-title" style="margin-bottom: 30px;">
                        <h2>Global Security Setting</h2>
                    </div>

                    {!!Form::open(['method'=>'POST','url'=>PREFIX.'/global_setting'])!!}
                    <div class="form-group row" style="border-top: 0px;">
                        <input type="hidden" value="{{Auth::guard('web')->user()->id}}" name="user_id">
                        <div class="col-sm-8">
                            <div class="radio">
                                <label>
                                    <input name="globalSecurityOption" value="0" type="radio" @if($user->global_setting=='false'){{'checked'}}@endif>
                                    No Global Authentication
                                </label>
                            </div>
                            @if(!empty($securitySettings))
                                @foreach($securitySettings as $ss)
                                    <div class="radio">
                                        <label>
                                            <input name="globalSecurityOption" value="{{$ss->id}}" type="radio" @if($user->security==$ss->id && $user->global_setting=='true'){{'checked'}}@endif>
                                            {{$ss->title}}
                                        </label>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok" style="margin-right:10px;"></i>Save</button>
                        </div>
                    </div>
                    {!!Form::close() !!}

                </div>
                <div class="clearfix"></div>
                <hr>
                @endif
                <div class="col-md-6">
                    <div id="page-title" style="margin-bottom: 30px;">
                        <h2>Current Security Setting</h2>
                    </div>
                    <div class="form-group row" >

                        <label class="col-sm-4 control-label">IP</label>
                        <div class="col-sm-6">
                            <p>{{Auth::guard('web')->user()->ip}}</p>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-4 control-label">City</label>
                        <div class="col-sm-6">
                            <p>{{Auth::guard('web')->user()->city}}</p>
                        </div>
                    </div>
                    <div class="form-group row">

                        <label class="col-sm-4 control-label">Country</label>
                        <div class="col-sm-6">
                            <p>{{Auth::guard('web')->user()->country}}</p>
                        </div>
                    </div>
                    @if(Auth::guard('web')->user()->global_setting=='false')
                    <div  id="#localSecurityOption">
                    {!!Form::open(['method'=>'POST','url'=>PREFIX.'/profile'])!!}
                    <div class="form-group row" style="border-top: 0px;">
                        <input type="hidden" value="{{Auth::guard('web')->user()->id}}" name="user_id">
                        <label class="col-sm-4 control-label">Security Setting</label>
                        <div class="col-sm-8">
                            @if(!empty($securitySettings))
                                @foreach($securitySettings as $ss)
                                    <div class="radio">
                                        <label>
                                            <input name="securityOption" value="{{$ss->id}}" type="radio" @if($user->security==$ss->id){{'checked'}}@endif>
                                            {{$ss->title}}
                                        </label>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-4 control-label">&nbsp;</label>
                        <div class="col-sm-6">
                                <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok" style="margin-right:10px;"></i>Save</button>
                        </div>
                    </div>
                    {!!Form::close() !!}
                </div>
                        @endif

                </div>


                <div class="clearfix"></div>

            </div>

            <div class="clearfix"></div>

        </div>
    </div>



@stop
@section('scripts')
    @if(Auth::guard('web')->user()->id==1)
    <script>
        $(document).ready(function() {
            $("input[name$='globalSecurityOption']").click(function() {
            var option = $(this).val();
                if(option==0){
                    $("#localSecurityOption").show();
                }
            });
        });
    </script>
    <style>
      .radio{
       ``margin-top:0px;
      }
    </style>
    @endif
    @stop










