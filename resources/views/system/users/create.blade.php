@extends('layouts.system')

@section('title', translate('Add New User'))

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{translate('Home')}}</a></li>
        <li><a href="{{URL::to(PREFIX.'/user')}}" >{{translate('Users')}}</a></li>
        <li class="active">{{translate('Add User')}}</li>
    </ol>

    <div id="page-title">
        <h2 style="display:inline-block">{{translate('Add User')}}</h2>
    </div>

    @include('errors/errors')

    <div class="panel panel-default">
      <div class="panel-body">
        {!!Form::open(['method'=>'POST','url'=>PREFIX.'/user', 'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}
          <div class="form-group" style="border-top: 0px;">
            <label class="col-sm-3 control-label require">First Name</label>
            <div class="col-sm-6">
                <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{Input::old('first_name')}}">
            </div>
          </div>
          <div class="form-group" >
              <label class="col-sm-3 control-label require">Last Name</label>
              <div class="col-sm-6">
                  <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{Input::old('last_name')}}">
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label require">Email</label>
            <div class="col-sm-6">
                <input type="text" name="email" placeholder="Email" class="form-control" value="{{Input::old('email')}}">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label require">Username</label>
            <div class="col-sm-6">
                <input type="text" name="username" placeholder="Username" class="form-control" value="{{Input::old('username')}}">
            </div>
          </div>
          <div class="form-group">
              {!! Form::label('image',translate('Image'), ['class'=>'control-label col-sm-3']) !!}
              <div class="col-sm-6">
                  <input type="file" class="form-control" id="image" onchange="readURL(this)" name="image" placeholder="">
                  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: auto;margin-top:10px; display: inline-block;">
                      <img id="fileinput-preview-thumbnail" src="{{URL::asset('backend/image-resources/no-image.jpg')}}" >
                  </div>
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label"></label>
            <div class="col-sm-6">
                <label class="radio-inline">
                    {{ Form::radio('set_password_status',1,0,['id'=>'set-password' ,'onclick'=>'showSetpassword()']) }}
                    Set Password
                </label>
                <label class="radio-inline">
                    {{ Form::radio('set_password_status',0,0,['onclick'=>'hideSetpassword()']) }}
                    Set Activation Link
                </label>
  
            </div>
        </div>
        <div class="password" hidden>
          <div class="form-group">
            <label class="col-sm-3 control-label require">Password</label>
            <div class="col-sm-6">
                <input type="password" name="password" placeholder="Password" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label require">Confirm Password</label>
            <div class="col-sm-6">
                <input type="password" name="password_confirmation" placeholder="Confirm Password" class="form-control">
            </div>
          </div>
        </div>
          <div class="form-group">
            <label class="col-sm-3 control-label require">Role</label>
            <div class="col-sm-6">
                {!! Form::select('roles',$roles,Input::old('roles'),['class'=>'form-control']) !!}
            </div>
          </div>

          <div class="form-group">
              <label class="col-sm-3 control-label">Status<span style="color:red;">*</span></label>
              <div class="col-sm-6">
                  <label class="radio-inline">
                      {{ Form::radio('status',1,true) }}

                      Active
                  </label>
                  <label class="radio-inline">
                      {{ Form::radio('status',0) }}
                      Inactive
                  </label>

              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-3"></div>
              <div class="col-sm-7">
                  <a class="btn btn-default" href="{{URL::to(PREFIX.'/user')}}"><i class="glyphicon glyphicon-chevron-left" style="margin-right:10px;"></i>{{('Back')}}</a>
                  <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok" style="margin-right:10px;"></i>{{translate('Save')}}</button>
              </div>
          </div>

          {!!Form::close() !!}
          <div class="clearfix"></div>

        </div>
    </div>

@stop

@section('scripts')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#fileinput-preview-thumbnail').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        if ($("#set-password").is(':checked')){
            $('.password').show();
            $('#password').attr('required','required');
            $('#password-confirm').attr('required','required');
        }

        function showSetpassword(){
            $('.password').show();
            $('#password').attr('required','required');
            $('#password-confirm').attr('required','required');
        }

        function hideSetpassword(){
            $('.password').hide();
            $('#password').val('');
            $('#password-confirm').val('');
            $('#password').removeAttr('required','required');
            $('#password-confirm').removeAttr('required','required');
        }
    </script>
@stop
