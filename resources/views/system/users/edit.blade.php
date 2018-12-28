@extends('layouts.system')

@section('title', 'Edit Users')

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{translate('Home')}}</a></li>
        <li><a href="{{URL::to(PREFIX.'/user')}}" >{{translate('Users')}}</a></li>
        <li class="active">Edit User</li>
    </ol>

    <div id="page-title">
        <h2 style="display:inline-block">Edit Users</h2>
    </div>

@include('errors/errors')
<div class="panel panel-default">
  <div class="panel-body">
    {!!Form::model($data,['method'=>'PUT','url'=>PREFIX.'/user/'.$data->id, 'class'=>'form-horizontal bordered-row','enctype'=>'multipart/form-data'])!!}
    <input type="hidden" name="id" value="{{$data->id}}">
      <div class="form-group" style="border-top: 0px;">
          <label class="col-sm-3 control-label require">First Name</label>
          <div class="col-sm-6">
              <input type="text" name="first_name" placeholder="First Name" class="form-control" value="{{$data->first_name}}">
          </div>
      </div>
      <div class="form-group" >
          <label class="col-sm-3 control-label require">Last Name</label>
          <div class="col-sm-6">
              <input type="text" name="last_name" placeholder="Last Name" class="form-control" value="{{$data->last_name}}">
          </div>
          </div>
      <div class="form-group">
        <label class="col-sm-3 control-label require">Email</label>
        <div class="col-sm-6">
            <input type="text" name="email" placeholder="Email" class="form-control" value="{{$data->email}}">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label require">Username</label>
        <div class="col-sm-6">
            <input type="text" name="username" placeholder="Username" class="form-control" value="{{$data->username}}">
        </div>
      </div>
      <div class="form-group">
          {!! Form::label('image',translate('Image'), ['class'=>'control-label col-sm-3']) !!}
          <div class="col-sm-6">
              <input type="file" class="form-control" id="image" onchange="readURL(this)" name="image" placeholder="">

              @if(isset($data))
                  @if(!empty($data->image) )
                      <div class="col-md-1 fileinput-preview thumbnail" data-trigger="fileinput"  style="width: 100px; height: auto;margin-top:10px; display: inline-block;">
                          {{--<a href="{{ URL(PREFIX.'/startup/deleteImage/'.$data->id) }}"><i class="fa fa-times cross-icon" aria-hidden="true">X</i></a>--}}
                          <img id="fileinput-preview-thumbnail" src="{{URL::asset('/uploads/users/'.$data->image)}}" >
                      </div>
                  @else
                      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 100px; height: auto;margin-top:10px; display: inline-block;">
                          <img id="fileinput-preview-thumbnail" src="{{URL::asset('backend/image-resources/no-image.jpg')}}" >
                      </div>
                  @endif
              @endif
              
          </div>
      </div>



      @if($data->rolesUser->role_id == 1)
          @if(($superUserCount) <= 1)
              <div class="form-group">
              </div>
              <input type="hidden" name="roles" value="{{$data->rolesUser->role_id}}">
              <fieldset disabled>
                  @endif
                  <div class="form-group">
                      <label class="col-sm-3 control-label require">Roles</label>
                      <div class="col-sm-6">
                          {!! Form::select('roles',$roles,$data->rolesUser->role_id,['class'=>'form-control']) !!}
                      </div>
                  </div>
                  @if(($superUserCount) <= 1)
              </fieldset>
          @endif
          @else
          <div class="form-group">
              <label class="col-sm-3 control-label require">Group</label>
              <div class="col-sm-6">
                  {!! Form::select('roles',$roles,$data->rolesUser->role_id,['class'=>'form-control']) !!}
              </div>
          </div>
      @endif

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
                <a class="btn btn-default" href="{{URL::to(PREFIX.'/user')}}"><i class="glyphicon glyphicon-chevron-left" style="margin-right:10px;"></i>{{translate('Back')}}</a>
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
    </script>

@stop
