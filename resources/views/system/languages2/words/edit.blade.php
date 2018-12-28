@extends('layouts.system')

@section('title', 'Edit Word')

@section('content')

<div id="page-title">
        <h2 style="display:inline-block">{{ translate('Edit Word') }}</h2>
        <div class="clearfix"></div>
</div>

<div class="breadcrumb-section clearfix">
  <ol class="breadcrumb">
    <li><a href="{{URL::to(PREFIX.'/home')}}">{{ translate('Home') }}</a></li>
    <li><a href="{{URL::to(PREFIX.'/words')}}" >{{ translate('Word') }}</a></li>
    <li class="active">{{ translate('Edit') }}</li>
  </ol>
</div>

 <div class="row">
    <div class="panel">
      <div class="panel-body">

        {!! Form::open(array('url' => PREFIX.'/words/'.$pageData->id, 'method'=>'PUT', 'class'=>'form-horizontal bordered-row')) !!}

          <input type="hidden" name="id" value="{{$pageData->id}}">
          <div class="form-group" style="border-top: 0px;">
              <label class="col-sm-2 control-label">Word *:</label>
              <div class="col-sm-10">
                  {{ Form::text('word', $pageData->word, array('class' => 'form-control', 'placeholder' => 'Word')) }}
                  @if($errors->any())
                      <label class="error" for="word">{{$errors->first('word')}}</label>
                  @endif
              </div>
          </div>

          <div class="form-group">
              <div class="col-lg-offset-2 col-lg-6">
                  <button class="btn btn-primary" type="submit"><i class="glyph-icon icon-check"></i> {{ translate('Update') }}</button>
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

@stop
