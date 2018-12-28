@extends('layouts.system')

@section('title', 'Add New Word')

@section('content')

<div id="page-title">
        <h2 style="display:inline-block">{{ translate('Add New Word') }}</h2>
        <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/words')}}" >{{ translate('Word') }}</a></li>
    <li class="active">{{ translate('Add') }}</li>
  </ol>
</div>

 <div class="row">
    <div class="panel">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/words', 'method'=>'POST', 'class'=>'form-horizontal bordered-row')) !!}


          <div class="form-group" style="border-top: 0px;" >
              <label class="col-sm-2 control-label">Word :</label>
              <div class="col-sm-9">
                <input type="text" name="words[]" class="form-control" placeholder="Word">
              </div>
          </div>

          <div class="form-group">
              <label class="col-sm-2 control-label">Word :</label>
              <div class="col-sm-9">
                <input type="text" name="words[]" class="form-control" placeholder="Word">
              </div>
          </div>

          <div id="moreForm" class="bordered-row"></div>

          <br>
          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Save') }}</button>
                  <button id="addForm" class="btn btn-default bootstrap-touchspin-up" type="button">+ Add More Word</button>
                  <a href="{{URL::to(PREFIX.'/words')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>

        {!! Form::close()!!}

        <div class="clearfix"></div>

      </div>
    </div>
  </div>


@stop

@section('scripts')

<script type="text/javascript">
  var counter = 3;

  $('#addForm').click(function(){

    $('#moreForm').append('<div class="form-group" id="'+(counter++)+'">'+
                            '<label class="col-sm-2 control-label">Word :</label>'+
                            '<div class="col-sm-9"> <input type="text" name="words[]" class="form-control" placeholder="Word"> </div>'+
                            '<div class="col-sm-1"> <span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up removeForm" type="button">X</button></span> </div>'+
                          '</div>');
  });

  $('#moreForm').on('click', '.removeForm', function() {
    var tem = $(this).parents("div:eq(1)").attr('id');
    $('#'+tem).remove();
  });
</script>

@stop
