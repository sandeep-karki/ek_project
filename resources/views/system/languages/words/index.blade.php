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
                    {{--<a class="btn btn-success pull-right" href="{{URL::to(PREFIX.'/words/create')}}"><i class="glyph-icon icon-plus"></i>{{('Add New')}}</a>--}}
                    <button type="submit" class="btn btn-success pull-right" id="addNew"><i class="fa fa-plus"></i> Add New</button>
            </div>
        </div>
    </div>
    @include('system.languages.words.create')

    @include('errors.errors')

    <div class="panel">
        <div class="panel-box">
          <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover cf">
              <thead class="cf">
                <tr>
                    <th>{{ translate('S.N.') }}</th>
                    <th>{{ translate('Words') }}</th>
                    <th>{{ translate('Action') }}</th>
                </tr>
              </thead>
              <tbody>
                @php $a=0; @endphp
                @foreach($pageData as $pData)
                    @php $a++ @endphp
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$pData->word}}</td>
                    <td>
                      {{--<a class="btn  btn-sm btn-info btn_glyph"  href="{{URL::to(PREFIX.'/words/'.$pData->id.'/edit')}}"><i class="glyphicon glyphicon-edit"></i> {{ translate('Edit') }}</a>--}}
                        <button type="button" class="btn btn-primary btn-sm edit" id="{{$pData->id}}"><i class="fa fa-pencil-square-o"></i> {{ translate('Edit')}}</button>
                        <a href="javascript:void(0)" data-toggle="modal" data-target="#confirm-delete" data-href="{{URL::to(PREFIX.'/words/'.$pData->id)}}" class="btn btn-danger btn-sm "><i class="glyph-icon icon-trash"></i> {{ translate('Delete') }}</a>
                      </a>
                    </td>
                </tr>
                <tr class="colsp-tr">
                    <td colspan="3" style="border: none;">
                        @include('system.languages.words.edit')
                    </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

            @if(!$pageData->isEmpty())
                <div class="pagination-tile"> <label class="pagination-sub" style="display: block;">{{translate('Showing')}} {{($pageData->currentpage()-1)*$pageData->perpage()+1}} {{translate('to')}} {{(($pageData->currentpage()-1)*$pageData->perpage())+$pageData->count()}} {{translate('of')}} {{$pageData->total()}} {{translate('entries')}}</label>
                    <ul class="pagination">
                        {!! str_replace('/?', '?',$pageData->appends(['keywords'=>Input::get('keywords')])->render()) !!}

                    </ul>
                </div>
            @endif
            <div class="clearfix"></div>


        </div>
    </div>


@stop

@section('scripts')
    <script type="text/javascript">
        var counter = 3;

        $('#addForm').click(function(){

            $('#moreForm').append('<div class="form-group" id="'+(counter++)+'">'+
                '<label class="col-sm-3 control-label">Word :</label>'+
                '<div class="col-sm-8"> <input type="text" name="words[]" class="form-control" placeholder="Word"> </div>'+
                '<div class="col-sm-1"> <span class="input-group-btn"><button class="btn btn-default bootstrap-touchspin-up removeForm" type="button">X</button></span> </div>'+
                '</div>');
        });

        $('#moreForm').on('click', '.removeForm', function() {
            var tem = $(this).parents("div:eq(1)").attr('id');
            $('#'+tem).remove();
        });
    </script>
    @include('system.shared.confirm-delete')

@stop
