@extends('layouts.system')
@section('title', $pageTitle)

@section('content')

<div id="page-title">
    <h2 style="display:inline-block">{{translate($pageTitle) }}</h2>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li class="active">{{translate($pageTitle)}}</li>
  </ol>
</div>

@include('errors.errors')

<div class="panel">
  <div class="panel-body">

    {!!Form::open(['method'=>'GET','url'=>PREFIX.'/translation', 'class'=>'form-horizontal'])!!}
      <div class="form-group">
        <div class="col-sm-5"></div>
        <div class="col-md-4"></div>
        <!-- <label class="col-sm-2 control-label">{{ translate('Choose Language') }}</label> -->
          <div class="col-md-3">
            <div class="input-group">
                <!-- {!! Form::select('lang', $languages, null, ['class' => 'form-control']) !!} -->
                <select name="lang" class="form-control" onchange="this.form.submit()">
                  @foreach($languages as $key => $val)
                  <option value="{{$key}}" @if($key == $langId) selected @endif>{{$val}}</option>
                  @endforeach
                </select>

            </div>
          </div>
      </div>
    {!!Form::close() !!}

    <div class="example-box-wrapper">
      <div class="scroll-columns">

        {!!Form::open(['method'=>'POST','url'=>PREFIX.'/translation/updateTranslation', 'class'=>'form-horizontal'])!!}
        <input type="hidden" name="langId" value="{{$langId}}">
        <table class="table table-bordered table-striped table-condensed cf">
          <thead class="cf">
            <tr>
                <th>{{ translate('S.N.') }}</th>
                <th>{{ translate('Word') }}</th>
                <th>{{ translate('Translate Word') }}</th>
            </tr>
          </thead>
          <tbody>
            @php $a=0; @endphp

            @foreach($pageData as $pData)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pData->word}}</td>
                <td>
                  @if(array_key_exists($pData->id, $langTransId))
                  {{ Form::text("transword[$pData->id]", $langTransId[$pData->id], array('class' => 'form-control', 'placeholder' => 'Translate Word')) }}
                  @else
                  {{ Form::text("transword[$pData->id]", null, array('class' => 'form-control', 'placeholder' => 'Translate Word')) }}
                  @endif
                </td>
            </tr>
            @endforeach

          </tbody>
        </table>

        <div class="form-group">
          <div class="col-md-12">
              <button class="btn btn-info pull-right" type="submit"><i class="glyphicon glyphicon-refresh"></i> {{ translate('Update') }}</button>
          </div>
        </div>

        {!!Form::close() !!}
      </div>
    </div>

</div>
</div>

@include('system.shared.confirm-delete')
@stop

@section('scripts')

<!-- <script type="text/javascript">
  $("#langlist").change(function(){
    var lang = $(this).val();
    $('#langId').val(lang);
});
</script> -->

<link rel="stylesheet" type="text/css" href="{{URL::asset('backend/widgets/input-switch/inputswitch.css')}}">

<script type="text/javascript" src="{{URL::asset('backend/widgets/input-switch/inputswitch.js')}}"></script>
<script type="text/javascript">
/* Input switch */

$(function() { "use strict";
    $('.input-switch').bootstrapSwitch();
    $('.status').on('switchChange.bootstrapSwitch', function (event, state) {
        var id = $(this).data('id');
        $.ajax
            ({
                url: "{{ URL::to(PREFIX.'/config/pages/language/active')}}?id="+id,
                type: 'get',
                success: function(result)
                {
                    $('#status_'+id).html(result);
                },
                error: function()
                {
                    $('#modalinfo div').html(' <div class="modal-content"><div class="modal-header"><h2>Could not complete the request.</h2></div></div>');
                    $('#modalinfo').modal('show');
                }
            });
    });
});
</script>

@include('system.shared.toggle')

@stop
