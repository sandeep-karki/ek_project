@extends('layouts.system')
@section('title','Create '.$title)
@section('content')

    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{('Home')}}</a></li>
        <li><a href="{{URL::to(PREFIX.'/role')}}" >{{('Roles')}}</a></li>
        <li class="active">{{('Create Role')}}</li>
    </ol>

    <div id="page-title">
        <h2>{{('Create Role')}}</h2>
    </div>

    @include('errors/errors')

<div class="panel panel-default">
  <div class="panel-body">
    {!!Form::open(['method'=>'POST','url'=>PREFIX.'/role', 'class'=>'form-horizontal'])!!}
      <div class="form-group">
        <label class="col-sm-3 control-label require">{{('Name')}}</label>
        <div class="col-sm-6">
            <input type="text" class="form-control" name="name" placeholder="">
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-3 control-label require">{{('Permission')}}</label>
        <div class="col-sm-7">
            <div class="row">
              @foreach($permission as $key=>$module)
                  <div class="col-xs-12" style="margin-top:15px; margin-bottom:3px;">
                      <strong>
                          <label>
                            <input type="checkbox" name="modules{{$key}}" value="{{$key}}" class="modulesClass modules" id="{{$key}}" onclick='javascript:checkAll("{{$key}}")'>&nbsp;&nbsp;{{strtoupper($key)}}
                          </label>
                      </strong>
                  </div>
                  @foreach($module as $value=>$module_title)
                  <div class="col-lg-6">
                    <label class="sub-label">
                      <input type="checkbox" name="permissions[]" id="{{$key.'_module'}}" data-module="{{$key}}" value="{{$key.".".$value}}" class="modulesClass permission {{$key.'_module'}}">&nbsp;&nbsp;{{$module_title}}&nbsp;&nbsp;
                    </label>
                  </div>
                  @endforeach
              @endforeach
            </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label">&nbsp;</label>
        <div class="col-sm-7">
            <a class="btn btn-default" href="{{URL::to(PREFIX.'/role')}}"><i class="glyphicon glyphicon-chevron-left" style="margin-right:10px;"></i>{{('Back')}}</a>
            <button class="btn btn-primary" type="submit"><i class="glyphicon glyphicon-ok" style="margin-right:10px;"></i>{{('Save')}}</button>
        </div>
      </div>

      {!!Form::close() !!}
      <div class="clearfix"></div>

    </div>
</div>





@stop
@section('scripts')
    <script>
        $('.modules').click(function(){
            var module = $(this);
            if(module.prop('checked')!==false){
                $('.permission').each(function(){
                    var value = $(this).val();
                    if( value.indexOf(module.val()) !== -1){
                        if(value.indexOf('.view')!== -1){
                            $(this).prop('checked',true);
                        }
                    }
                });
            }
            else{
                $('.'+module.val()+'_module').each(function(){
                    $(this).prop('checked',false);
                });
            }
        });

        $('.permission').click(function(){
            var permission = $(this);
            var data = permission.val().split('.');
            var module = data[0];
            if(permission.prop('checked')==false){
                var countChecked = $('.'+module+"_module:checked").length;
                if(countChecked==0){
                    $('#'+module).prop('checked',false);
                }
            }
            else{
                $('#'+module).prop('checked',true);
            }
        });

        function checkAll(id) {
            $("."+id+"_module").prop('checked',true);
        }

    </script>
    @stop
