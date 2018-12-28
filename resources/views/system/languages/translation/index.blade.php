@extends('layouts.system')
@section('title', $pageTitle)

@section('content')
    <ol class="breadcrumb">
        <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
        <li class="active">{{translate($pageTitle)}}</li>
    </ol>
<div id="page-title">
    <h2>{{translate($pageTitle) }}</h2>
</div>


@include('errors.errors')
    <div class="content-display clearfix">
        <div class="panel panel-default">
            <div class="panel-heading no-bdr">
                <div class="row">
                    <div class="col-sm-8">
                        {!!Form::open(['method'=>'GET','url'=>PREFIX.'/translation', 'class'=>'form-inline'])!!}
                        <div class="form-group">
                            <select name="lang" class="form-control" onchange="this.form.submit()">
                                @foreach($languages as $key => $val)
                                    <option value="{{$key}}" @if($key == $langId) selected @endif>{{$val}}</option>
                                @endforeach
                            </select>
                        </div>

                        {!!Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="panel">
  <div class="panel-box">

      <div class="table-responsive">

        {!!Form::open(['method'=>'POST','url'=>PREFIX.'/translation/updateTranslation', 'class'=>'form-horizontal'])!!}
          <input type="hidden" name="short_code" value="{{$languageShortCode->short_code}}">
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
                    {{ Form::text("transwordWord[$languageShortCode->short_code][$pData->word]", isset($translatedWords) ? isset($translatedWords[$pData->word]) ? $translatedWords[$pData->word] !== null ? $translatedWords[$pData->word] : null :null:null, array('class' => 'form-control', 'placeholder' => 'Translate Word')) }}
                </td>
            </tr>
            @endforeach
            
          </tbody>
        </table>

        <div class="form-group">
          <div class="col-md-12">
            @if(count($pageData) > 0)
              <button class="btn  btn-info pull-right" type="submit"><i class="glyphicon glyphicon-refresh"></i> {{ translate('Update') }}</button>
            @endif
          </div>
        </div>

        {!!Form::close() !!}
      </div>

</div>
</div>

@stop

@section('scripts')

@stop
