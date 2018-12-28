@extends('layouts.system')
@section('title', $pageTitle)
@section('content')
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
        <li class="active">{{translate($pageTitle)}}</li>
    </ol>

    <div class="page-head clearfix">
        <div class="row">
            <div class="col-xs-9">
                <div class="head-title">
                    <h4>{{translate($pageTitle) }}</h4>
                </div><!-- ends head-title -->
            </div>
            <div class="col-xs-3">
                <button type="submit" class="btn btn-success pull-right" id="addNew"><i class="fa fa-plus"></i> Add New</button>
            </div>
        </div>
    </div>
    @include('system.languages.lang.create')

@include('errors.errors')
<div class="panel">
  <div class="panel-box">
    {{-- {{ getLang(); }} --}}
      <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover cf">
          <thead class="cf">
            <tr>
                <th>{{ translate('S.N.') }}</th>
                <th>{{ translate('Name') }}</th>
                <th>{{ translate('Short Code') }}</th>
                <th>{{ translate('Flag') }}</th>
                <th>{{ translate('Action') }}</th>
            </tr>
          </thead>
          <tbody>
            @php $a=0; @endphp
            @foreach($pageData as $pData)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$pData->name}}</td>
                <td>{{strtolower($pData->short_code)}}</td>
                 <td>
                    @if(!empty($pData->short_code))
                         <i class="language-img flag-icon flag-icon-{{$pData->short_code}} pull-left col-md-1"></i>
                    @else
                    No Image
                    @endif
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm edit" id="{{$pData->id}}"><i class="fa fa-pencil-square-o"></i> {{ translate('Edit')}}</button>
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to(PREFIX.'/languages/'.$pData->id)}}" class="btn btn-danger btn-sm"><i class="glyph-icon icon-trash"></i> {{translate('Delete')}}</a>
                  </a>
                </td>
            </tr>
            <tr class="colsp-tr">
                <td colspan="5" style="border: none;">
                    @include('system.languages.lang.edit')
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    {!! str_replace('/?', '?',$pageData->appends(['keywords'=>Input::get('keywords')])->render()) !!}
</div>
</div>

@stop
@section('scripts')
    @include('system.shared.preview-image')

    <script>
        $('#short-code-flag').select2({
            placeholder: "Select Short code!!",
            width: "50%",
            allowClear: true,
            templateResult: format,
            templateSelection: function (option) {
                if (option.id.length > 0 ) {
                    return option.text + ' <i class="flag-icon flag-icon-'+option.text+'"></i>';
                } else {
                    return option.text;
                }
            },
            escapeMarkup: function (m) {
                return m;
            }

        });

        function format(option) {

            modified_option = option.text + ' <i class="flag-icon flag-icon-'+option.text+'"></i>';
            return modified_option;
        }
    </script>
    @include('system.shared.confirm-delete')
@stop