@extends('layouts.system')

@section('title', 'Manage Language')

@section('content')

<div id="page-title">
        <h2 style="display:inline-block">{{ translate('Manage Language') }}</h2>
        <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/langcategory')}}" >{{ translate('Language Category') }}</a></li>
    <li class="active">{{ translate('Manage Language') }}</li>
  </ol>
</div>

@include('errors/errors')

 <div class="row">
    <div class="panel">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/langcategory/'.$id.'/manageLanguage', 'method'=>'POST', 'class'=>'form-horizontal bordered-row')) !!}

          <input type="hidden" name="id" value="{{$id}}">
          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-2 control-label">Languages *:</label>
              <div class="col-sm-10">
                @foreach($languages as $lang)
                <?php if(in_array($lang->id, $selectedLang)) $status = 'checked'; else $status = ''; ?>
                <div class="col-sm-2">
                    <input type="checkbox" name="lang[]" value="{{$lang->id}}" {{$status}}> {{$lang->name}}<br>
                </div>
                @endforeach
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check" @if(count($languages) == 0) disabled @endif></i> {{ translate('Update') }}</button>
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
