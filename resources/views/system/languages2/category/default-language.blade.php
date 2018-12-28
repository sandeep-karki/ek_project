@extends('layouts.system')

@section('title', 'Default Language')

@section('content')

<div id="page-title">
        <h2 style="display:inline-block">{{ translate('Default Language') }}</h2>
        <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/langcategory')}}" >{{ translate('Language Category') }}</a></li>
    <li class="active">{{ translate('Default Language') }}</li>
  </ol>
</div>

@include('errors/errors')

 <div class="row">
    <div class="panel">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/langcategory/'.$pageData->id.'/defaultLanguage', 'method'=>'POST', 'class'=>'form-horizontal bordered-row')) !!}

          <input type="hidden" name="id" value="{{$pageData->id}}">
          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-2 control-label">Languages *:</label>
              <div class="col-sm-10">
                @foreach($languages as $lang)
                <?php if($lang->id == $pageData->default_lang) $status = 'checked'; else $status = ''; ?>
                <div class="col-sm-2">
                    <input type="radio" name="defaultlang" value="{{$lang->id}}" {{$status}}> {{$lang->name}}<br>
                </div>
                @endforeach
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit" @if(count($languages) == 0) disabled @endif><i class="glyph-icon icon-check"></i> {{ translate('Update') }}</button>
                  <a href="{{URL::to(PREFIX.'/langcategory')}}" class="btn btn-default"><i class="glyph-icon icon-close"></i> {{ translate('Cancel') }}</a>
              </div>
          </div>
              
        {!! Form::close()!!} 
         
        <div class="clearfix"></div>  

      </div>
    </div>
  </div>


@stop

@section('scripts')


@stop
