@extends('layouts.system')
@section('title', $pageTitle)
@section('content')
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
        <li class="active">{{translate($pageTitle)}}</li>
    </ol>
    <div id="page-title">
        <h2 style="display:inline-block">{{translate($pageTitle) }}</h2>
    </div>

@include('errors.errors')
<div class="panel">
  <div class="panel-box">
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover cf">
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
                      <button type="button" class="btn btn-primary btn-sm manage" id="lang_{{$pData->id}}">{{ translate('Language') .' ('.count($pData->language).')'}}</button>
                      <button type="button" class="btn btn-primary btn-sm default" id="default_{{$pData->id}}"@if(!count($pData->language) > 0){{'disabled'}} @endif>{{ translate('Default Language') }}</button>
                </td>
            </tr>
            <tr class="colsp-tr">
                <td colspan="3" style="border: none;">
                    @include('system.languages.category.manage-language')
                </td>
            </tr>
            <tr class="colsp-tr">
                <td colspan="3" style="border: none;">
                    @include('system.languages.category.default-language')
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
</div>
</div>

@stop
@section('scripts')

<script type="text/javascript">
/* Input switch */
$(function() { "use strict";

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
<script>
    $(document).ready(function() {
        $('.manage').click(function() {
            var id = this.id;
            $('#pop_'+id).slideToggle("slow");
        });
        $('.default').click(function() {
            var id = this.id;
            $('#pop_'+id).slideToggle("slow");
        });
    });
</script>
@stop