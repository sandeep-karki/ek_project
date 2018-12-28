@extends('layouts.system')
@section('title', $pageTitle)

@section('content')

<div id="page-title">
    <h2 style="display:inline-block">{{translate($pageTitle) }}</h2>
<!--     <div class="right" style="float:right">
      <a class="btn btn-primary" href="{{URL::to(PREFIX.'/langcategory/create')}}"><i class="glyph-icon icon-plus" style="margin-right:10px;"></i>{{ translate('Add New') }}</a>
    </div> -->
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
    <div class="example-box-wrapper">
      <div class="scroll-columns">
        <table class="table table-bordered table-striped table-condensed cf">
          <thead class="cf">
            <tr>
                <th>{{ translate('S.N.') }}</th>
                <th>{{ translate('Name') }}</th>
                <th>{{ translate('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @php $a=0; @endphp

            @foreach($pageData as $pData)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pData->name}} </td>
                <td>
                  <a class="btn btn-sm btn-primary btn_glyph"  href="{{URL::to(PREFIX.'/langcategory/'.$pData->id.'/manageLanguage')}}"> {{ translate('Language') .' ('.count($pData->language).')'}}</a>
                  <a class="btn btn-sm btn-warning btn_glyph"  @if(count($pData->language) > 0) href="{{URL::to(PREFIX.'/langcategory/'.$pData->id.'/defaultLanguage')}}" @else disabled @endif>{{ translate('Default Language') }}</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

</div>
</div>

@include('system.shared.confirm-delete')

@stop

@section('scripts')

{{--<link rel="stylesheet" type="text/css" href="{{URL::asset('backend/widgets/input-switch/inputswitch.css')}}">--}}

{{--<script type="text/javascript" src="{{URL::asset('backend/widgets/input-switch/inputswitch.js')}}"></script>--}}
{{--<script type="text/javascript">--}}
{{--/* Input switch */--}}

{{--$(function() { "use strict";--}}
    {{--$('.input-switch').bootstrapSwitch();--}}
    {{--$('.status').on('switchChange.bootstrapSwitch', function (event, state) {--}}
        {{--var id = $(this).data('id');--}}
        {{--$.ajax--}}
            {{--({--}}
                {{--url: "{{ URL::to(PREFIX.'/config/pages/language/active')}}?id="+id,--}}
                {{--type: 'get',--}}
                {{--success: function(result)--}}
                {{--{--}}
                    {{--$('#status_'+id).html(result);--}}
                {{--},--}}
                {{--error: function()--}}
                {{--{--}}
                    {{--$('#modalinfo div').html(' <div class="modal-content"><div class="modal-header"><h2>Could not complete the request.</h2></div></div>');--}}
                    {{--$('#modalinfo').modal('show');--}}
                {{--}--}}
            {{--});--}}
    {{--});--}}
{{--});--}}
{{--</script>--}}

@stop
